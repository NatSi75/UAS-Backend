<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Routing\Controller;

class EditorController extends Controller
{
    public function index() {
        $editors = Editor::first();
        return view('welcome', ['editors' => $editors]);
    }
}
