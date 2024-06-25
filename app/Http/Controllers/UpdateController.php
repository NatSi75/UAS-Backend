<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Redirect;

class UpdateController extends Controller
{
public function updateProfile(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'username' => 'sometimes|min:5|max:64',
            'email' => 'sometimes|unique:editors|max:64',
            'phone_number' => 'sometimes|min:11|max:13',
        ]);
            $editors = Auth::user();
            $editors->username=$request->input('username');
            $editors->email=$request->input('email');
            $editors->phone_number = $request->input('phone_number');
    
            $editors->update($validatedData);
            return redirect('/profile')->with('updateProfile','Update Profile Berhasil!');
    }
}