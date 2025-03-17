<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
Route::get('/profile', function () {
    $user = Auth::user();
    return view('profile',compact('user'));
});
Route::post('logout', [LoginController::class ,'logout'])->name('user.logout');
