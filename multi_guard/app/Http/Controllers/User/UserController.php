<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{

    function create(Request $request)
    {
        //Vallidate Inputs
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \hash('md5',$request->password,TRUE);
        $save = $user->save();

        if($save){
            return redirect()->back()->with('success','You are now registered...');
        }else{
            return redirect()->back()->with('fail','Something went wrong');
        }

    }


    function check(Request $request)
    {
        //Validation
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30',
        ],[
            'email.exists'=>"Bu Mail Adresi Kayıtlarda Yok."
        ]);

        $creds=$request->only('email','password');

        if (Auth::attempt($creds)) {
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }


    }


    function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
