<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login ()
    {
        return view('auth.login');
    }
    public function registration ()
    {
        return view('auth.registration');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|min:2|max:255|regex:/^[A-Za-z\s]+$/',
            'email' => 'required|email:dns|unique:users|email',
            'username' => 'required|unique:users|min:3|max:255|string',
            'password' => 'required|min:5|max:255|string|regex:/[0-9]/',
            'role' => 'required'
            ]);

            User::create($validatedData);

            return redirect('/login')->with('success', 'Registration successfully! Please login.');
    }
    
    public function authenticate(Request $request)
    {
         $credentials = $request->validate([
            'username' => 'required|min:3|max:255|string',
            'password' => 'required|min:5|max:255|string|regex:/[0-9]/',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Login failed!');
        // return dd($request->all());
    }
}
