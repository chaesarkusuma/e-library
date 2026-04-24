<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = book::all();

        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:books|max:255',
            "cover" => "required|image|max:1024",
            "body" => "required",
            "published_at" => "date",
            "category_id" => "required",
            "author_id" => "required",
        ]);

        if ($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('book-covers', 'public');
        }

        $book = book::create($validatedData);

        return response()->json([
            "message" => "Book created successfully!",
            "data" => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = book::find($id);

        if ($book) {
            return response()->json($book, 200);
        } else {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        } else {
            $rules = [
                'name' => 'sometimes|max:255',
                "cover" => "image|max:1024",
                "body" => "sometimes",
                "published_at" => "date",
                "category_id" => "sometimes",
                "author_id" => "sometimes",
            ];

            if ($request->slug != $book->slug) {
                $rules['slug'] = 'sometimes|unique:books|max:255';
            }

            $validatedData = $request->validate($rules);

            if ($request->hasFile('cover')) {
                if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                    Storage::disk('public')->delete($book->cover);
                }

                $validatedData['cover'] = $request->file('cover')->store('book-covers', 'public');
            }

            $book->update($validatedData);

            return response()->json([
                "message" => "Data buku" . $id . 'berhasil diupdate',
                "data" => $book
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Data buku tidak di temukan'], 404);
        } else {

            if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }

            $book->destroy($id);

            return response()->json([
                "message" => "Data buku " . $id . ' berhasil dihapus',    
            ], 200);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:3',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role !== 'admin') {
                Auth::logout();
                return response()->json(['message' => 'Hanya admin yang bisa login'], 403);
            }

            $token = $user->createToken('apitoken')->plainTextToken;

            return response()->json([
                'token' => $token
            ]);
        }

        return response()->json([
            'message' => 'Login failed!'
        ], 401);
    }

    public function booksByStatus(string $status)
    {
        $books = book::where('status', $status)->get();

        if ($books->count()) {

            return response()->json([
                'message' => 'Buku berhasil di temukan!' ,
                'data' => $books
            ], 200);
        } else {
            return response()->json(['message' => 'No books found with status'], 404);
        }
    }

    public function search(string $search)
    {
        $books =book::where('name', 'like', '%' . $search . '%')
        ->orWhere('body', 'like', '%' . $search . '%')
        ->get();

        if ($books->count()) {
            return response()->json([
                'message' => 'Buku berhasil di temukan!' ,
                'data' => $books
            ], 200);
        } else {
            return response()->json(['message' => 'No books found'], 404);
        }
    }
}
