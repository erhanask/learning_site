<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::get();
        return view('home', compact('users'));
    }

    public function get_users()
    {
        return DataTables::of(User::query())
        ->setrowId(
            function ($user) {
                return $user->id;
            }
        )
        ->setRowClass(function ($user){
            return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';
        })
        ->addColumn('email_verified_at', function(User $user){
            return $user->email_verified_at;
        })
        ->toJson();
    }
}
