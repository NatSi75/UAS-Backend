<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller{
public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
            $users = Auth::user();
            $users->name=$request->input('name');
            $users->email=$request->input('email');
            $users->phone_number = request->input('phone_number');
    
            $users->save();
            return Redirect::route('/profile');
    }
}