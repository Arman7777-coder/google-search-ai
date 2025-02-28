<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginInfo\LoginInfoController;
use App\Http\Controllers\Admin\Permissions\RolesController;
use App\Http\Controllers\Admin\Users\ProfileController;
use App\Http\Controllers\Admin\Users\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
Route::resource('users', UsersController::class);
Route::resource('roles', RolesController::class);
Route::resource('profile', ProfileController::class)->only(['index', 'update']);
Route::get('user/{type}', [UsersController::class, 'filterByType']);
Route::get('login-info', [LoginInfoController::class, 'index'])->name('login_info');
Route::post('login-info', [LoginInfoController::class, 'getLoginInfo'])->name('login_info.paginate');
Route::post('users/getRolePermissions/{roleId}', [UsersController::class, 'getRolePermissions']);

