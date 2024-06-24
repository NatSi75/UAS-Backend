<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Complain;

class AdminController extends Controller
{
    public function viewComplaints()
    {
        $complaints = Complain::all();
        return view('complaintsView', compact('complaints'));
    }

    public function clearComplaint($id)
    {
        $complaint = Complain::findOrFail($id);
        $complaint->delete();

        return back();
    }

    public function deleteAllComplaints()
    {
        Complain::truncate();

        return back();
    }
}