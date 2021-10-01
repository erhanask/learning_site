<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    function create(Request $request)
    {
        //Vallidate Inputs
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);

        $hashed_pw = Hash::make($request->password);

        $create = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashed_pw,
        ]);



        if ($create) {
            return redirect()->back()->with('success', 'You are now registered...');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong');
        }
    }

    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30',
        ],[
            'email.exists'=>'This email is not exists.',
        ]);

        $creds = $request->only('email','password');
        
        if (Auth::attempt($creds)) {
            return redirect()->route('admin.home');
        }else {
            return redirect()->route('admin.login')->with('fail','Bak doğru düzgün gir şunu haa.');
        }

    }

}
