<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('admin/login',[AdminController::class, 'adminform'])->name('login.form');
Route::post('login/admin',[AdminController::class, 'adminlogin'])->name('login.admin');


Route::group(['middleware'=>'admin'], function(){
    Route::get('admin/dashboard',[DashboardController::class, 'admindashbord'])->name('admin.dashboard');
    Route::get('admin/logout',[AdminController::class, 'adminlogout'])->name('admin.logout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
