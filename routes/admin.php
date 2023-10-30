<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProvedorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;



Route::get("", [HomeController::class,"index"])->name("admin.home");

// Route::put('admin/users/{user}', 'UserController@update')->name('admin.users.update');

Route::resource('users', UserController::class)->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('empleado', EmpleadoController::class)->names('empleado');
Route::resource('producto', ProductoController::class)->names('producto');
Route::resource('provedor', ProvedorController::class)->names('provedor');
Route::resource('cliente', ClienteController::class)->names('cliente');


