<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index() {
        $editors = Editor::first();
        return view('home', ['editors' => $editors]);
    }

    public function register(Request $request, int $id): RedirectResponse {
        $email = $request->input('email');
        return redirect('/{$email}');
    }
}