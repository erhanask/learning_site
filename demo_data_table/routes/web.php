<?php

use App\DataTables\ActivityDataTable;
use App\DataTables\CustomerDataTable;
use App\DataTables\UserDataTable;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/users",[HomeController::class, 'get_users'])->name('get.users')->middleware('auth');


Route::get("/customers",[CustomerController::class,'index'])->name("customers")->middleware('auth');


Route::get("/logs",[CustomerController::class,'logs'])->name("logs")->middleware('auth');;


