<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function dashboard() {
         $users = Auth::user();
         return view('dashboard', ['users' => $users]);
    }
}