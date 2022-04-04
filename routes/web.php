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
    // Admin CRUD
    Route::get('/admin',[App\Http\Controllers\HomeController::class, 'admin']);
    Route::get('/items',[App\Http\Controllers\ItemController::class, 'create']);
    Route::post('/items',[App\Http\Controllers\ItemController::class, 'store'])->name('storeItems');
    Route::get('/items/update/{id}',[App\Http\Controllers\ItemController::class, 'edit']);
    Route::put('/items/update/{id}',[App\Http\Controllers\ItemController::class, 'update'])->name('updateItems');
    Route::delete('/items/delete/{id}',[App\Http\Controllers\ItemController::class, 'destroy']);

});

Route::group(['middleware' => 'RoleMember'],function(){
    Route::get('/member',[App\Http\Controllers\HomeController::class, 'member']);
    Route::get('/edit-profile',[App\Http\Controllers\UserController::class, 'edit'])->name('editProfile');
    Route::put('/update-profile',[App\Http\Controllers\UserController::class, 'update'])->name('updateProfile');
});
