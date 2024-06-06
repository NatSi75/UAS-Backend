<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Models\Article;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function profile() {
        $editors = Editor::first();
        $articles = Article::where('editor', 'Natanael')->get();
        return view('profile', ['editors' => $editors, 'articles'=> $articles]);
    }

    public function register(Request $request): RedirectResponse {
        $editor = new Editor;
        $editor->username = $request->input('username');
        $editor->email = $request->input('email');
        $editor->phone_number = $request->input('phone_number');
        $editor->password = $request->input('password');
        $editor->save();
        return redirect('/');
    }
}