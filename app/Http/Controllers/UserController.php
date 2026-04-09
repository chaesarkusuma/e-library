<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $title = "user";

        return view('dashboard.user.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "user - create";

        return view('dashboard.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:2|max:255|regex:/^[A-Za-z\s]+$/',
            'slug' => 'required|string|unique:users',
            'email' => 'required|email:dns|unique:users|email',
            'username' => 'required|unique:users|min:3|max:255|string',
            'password' => 'required|min:5|max:255|string|regex:/[0-9]/',
            'role' => 'required'
        ]);

        User::create($validatedData);

        return redirect('/dashboard/user')->with('success', 'New User has been added!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $title = "user - edit";

        return view('dashboard.user.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|min:2|max:255|regex:/^[A-Za-z\s]+$/',
            'password' => 'required|min:5|max:255|string|regex:/[0-9]/',
            'role' => 'required'
        ];

        if (request('slug') != $user->slug) {
            $rules['slug'] = 'required|unique:users';
        }
        if (request('email') != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users|email';
        }
        if (request('username') != $user->username) {
            $rules['username'] = 'required|unique:users|min:3|max:255|string';
        }

        $validatedData = $request->validate($rules);

        User::where('slug', $user->slug)->update($validatedData);

        return redirect('/dashboard/user')->with('success', 'User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/user')->with('success', 'User has been deleted!');

    }
}
