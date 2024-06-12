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

class EditorController extends Controller
{
    public function profile() {
        $users = Auth::user();
        $articles = Article::where('editor', 'Natanael')->get();
        return view('profile', ['users' => $users, 'articles'=> $articles]);
    }

    public function register(Request $request): RedirectResponse
    {
        $validatedData = new User;

        $validatedData = $request->validate([
            'username' => 'required|min:5|max:64',
            'email' => 'required|unique:users|max:64',
            'phone_number' => 'min:11|max:13',
            'password' => [
                'required',
                'max:64',
                'regex:/^(?=.*[A-Z])(?=.*[0-9]).{8,}$/', //(?=.*[A-Z]) untuk memastikan minimal satu huruf kapital
                //(?=.*[0-9]) memastikan minimal mempunyai 1 angka
                //{8,} memastikan minimal punya panjang 8 karakter
            ],
            'confirm_password' => 'required|same:password',
        ]);
        
        //menghapus confirm_password dari array validatedData
        unset($validatedData['confirm_password']);

        //Hashing Password
        $validatedData['password'] = Hash::make($validatedData['password']);

        //Membuat objek Editor untuk menyimpan datanya ke database
        $user = new User($validatedData);
        $user->save();

        //Redirect ke home
        return redirect('/');
    }
}