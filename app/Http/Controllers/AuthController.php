<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    
    public function login() {
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        if (auth()->attempt(
            request()->only(['email','password']),
            request()->filled('remember')
        )) {
            return redirect()->intended('/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid credentials !');
    }

    public function logout() {
        auth()->logout();

        return redirect('/login');
    }



}