<?php

namespace App\Http\Controllers;

use App\Models\Editors;
use App\Models\Articles;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    public function profile() {
        $editors = Auth::user();
        $articles = Articles::where('editor', $editors->username)->paginate(2);
        return view('profile', ['editors' => $editors, 'articles'=> $articles]);
    }

    public function register(Request $request): RedirectResponse
    {
        $validatedData = new Editors;

        $validatedData = $request->validate([
            'username' => 'required|min:5|max:64',
            'email' => 'required|unique:editors|max:64',
            'phone_number' => 'numeric|digits_between:11,13',
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
        $editor = new Editors($validatedData);
        $editor->save();

        //Redirect ke home
        return redirect('/login')->with('register','Register Berhasil!');
    }

    public function changePassword(Request $request) {
        $editor = Auth::user();
        //validator
        $request->validate([
            'password' => 'required',
            'new_password' => [
                'required',
                'max:64',
                'regex:/^(?=.*[A-Z])(?=.*[0-9]).{8,}$/', //(?=.*[A-Z]) untuk memastikan minimal satu huruf kapital
                //(?=.*[0-9]) memastikan minimal mempunyai 1 angka
                //{8,} memastikan minimal punya panjang 8 karakter
            ],
            'confirm_new_password' => 'required',
        ]);

        if (!Hash::check($request->password, $editor->password)) {
            return back()->with('error', 'Wrong Password!');
        }

        if ($request->password === $request->new_password) {
            return back()->with('error', 'Enter your new password! That is your currently password!');
        }

        if ($request->new_password !== $request->confirm_new_password) {
            return back()->with('error', 'New Password does not match with Confirm New Password.');
        }

        $editor->password = Hash::make($request->new_password);
        $editor->save();

        return back()->with('successChangePassword', 'Password Changed Succesfully!');
    }
}