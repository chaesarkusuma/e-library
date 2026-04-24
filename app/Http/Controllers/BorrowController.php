<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BorrowController extends Controller
{
    public function store(Request $request)
    {
        $borrowDate = Carbon::today();
        $dueDate = $borrowDate->copy()->addDays(7);

        // Simpan data peminjaman
        Borrow::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrowed_date' => $borrowDate,
            'due_date' => $dueDate,
            'status' => 'diajukan',
        ]);

        $book = book::find($request->book_id);
        $book->status = 1;
        $book->save();

        $user = User::find($request->user_id);


        return redirect()->route('borrows', $user->slug)->with('success', 'Peminjaman berhasil diajukan.');
    }

    public function index()
    {
        $title = "Borrow | Index";
        $borrows = Borrow::latest()->paginate(9);

        return view('dashboard.borrow.index', compact('title', 'borrows'));
    }

    public function edit(Borrow $borrow)
    {
        $title = "Borrow | Edit";

        return view('dashboard.borrow.edit', compact('title', 'borrow'));
    }

    public function update(Request $request, Borrow $borrow)
    {
        if ($request->filled('message'))
            $borrow->message = $request->message;

        $borrow->status = $request->status;
        $borrow->save();

        $book = book::find($borrow->book_id);
        if($request->status == "diajukan" || $request->status == "dipinjam"){
            $book->status = 1;
            $book->save();
        } elseif($request->status == "dikembalikan" || $request->status == "ditolak"){
            $book->status = 0;
            $book->save();
        }

        return redirect('/dashboard/borrow')->with('success', 'Status peminjaman berhasil diperbarui.');
    }

    public function destroy(Borrow $borrow)
    {
        Borrow::destroy($borrow->id);

        return redirect('/dashboard/borrow')->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function userIndex(User $user)
    {
        $title = $user->name . ' Borrows';
        $borrows = Borrow::where('user_id', $user->id)->latest()->paginate(9);

        return view('borrows', compact('title', 'borrows'));
    }

    public function detail(Borrow $borrow)
    {
        $title = 'Detail Peminjaman';

        return view('borrow-detail', compact('title', 'borrow'));
    }
}