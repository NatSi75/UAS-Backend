<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function complaint()
    {
        return view('complain');
    }

    public function storeComplaint(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:64',
            'phone_number' => 'numeric|digits_between:11,13',
            'name' => 'required|min:5|max:64',
            'complaint' => 'required|min:5',
        ]);

        // Simpan data komplain ke database
        $complain = new Complain();
        $complain->email = $request->email;
        $complain->phone_number = $request->phone_number;
        $complain->name = $request->name;
        $complain->complaint = $request->complaint;
        $complain->save();

        return redirect('/')->with('storeComplaint','Complaint Submitted Succesfully!');
    }
}
