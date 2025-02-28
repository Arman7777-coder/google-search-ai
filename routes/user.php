<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
Route::get('/profile', function () {
    return view('profile');
});
Route::post('logout', [LoginController::class ,'logout'])->name('user.logout');
