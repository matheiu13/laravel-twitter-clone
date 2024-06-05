<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function store(){
        // validate
        $validated = request()->validate([
            'name' => 'required|min:5|max:45',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // create user
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // redirect
        return redirect()->route('dashboard')->with('success', 'User registered successfully');
    }

    public function authenticate(){
        // validate
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(auth()->attempt($validated)){

            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }

        // redirect
        return redirect()->route('login')->withErrors([
            'email' => "User doesn't exist"
        ]);
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success', 'Logged out successfully');
    }
}
