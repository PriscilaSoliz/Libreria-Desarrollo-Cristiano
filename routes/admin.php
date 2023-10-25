<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Admin\UserController;

Route::get("", [HomeController::class,"index"])->name("admin.home");

Route::resource('users', UserController::class)->names('admin.users');
Route::resource('empleado', EmpleadoController::class)->names('empleado');
Route::resource('producto', ProductoController::class)->names('producto');
Route::resource('cliente', ClienteController::class)->names('cliente');
