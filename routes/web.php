<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('pages/home');
});


Route::get('/user', [UserController::class,'index'])->name('user.index');
Route::get('/user/create', [UserController::class,'create'])->name('user.create');
Route::post('/user', [UserController::class,'store'])->name('user.store');
Route::get('/user/{user}/edit', [UserController::class,'edit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class,'update'])->name('user.update');
Route::delete('/user/{user}', [UserController::class,'destroy'])->name('user.destroy');

// Route::controller(UserController::class)->group(function(){
//     Route::get('/user', 'index')->name('user.index');
//     Route::get('/user/create', 'create')->name('user.create');
//     Route::post('/user', 'store')->name('user.store');
//     Route::get('/user/{user}/edit', 'edit')->name('user.edit');
//     Route::put('/user/{user}', 'update')->name('user.update');
//     Route::delete('/user/{user}', 'destroy')->name('user.destroy');
// });

