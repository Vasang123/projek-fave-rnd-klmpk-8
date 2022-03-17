<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'RoleAdmin'],function(){
    Route::get('/admin',[App\Http\Controllers\HomeController::class, 'admin']);
});

Route::group(['middleware' => 'RoleMember'],function(){
    Route::get('/member',[App\Http\Controllers\HomeController::class, 'member']);
});
