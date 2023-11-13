<?php

use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProvedorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\DetalleProductoController;
use App\Http\Controllers\NotasalidaController;
use App\Http\Controllers\NotadeentradaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetallecategoriaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetallecompraController;


Route::get("", [HomeController::class,"index"])->name("admin.home");

// Route::put('admin/users/{user}', 'UserController@update')->name('admin.users.update');


Route::resource('users', UserController::class)->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('empleado', EmpleadoController::class)->names('empleado');
Route::resource('producto', ProductoController::class)->names('producto');
Route::resource('notasalida', notasalidaController::class)->names('notasalida');
Route::resource('categoria', CategoriaController::class)->names('categoria');
Route::resource('notadeentrada', NotadeentradaController::class)->names('notadeentrada');
Route::resource('detallecategoria', DetallecategoriaController::class)->names('detallecategoria');
Route::resource('venta', VentaController::class)->names('venta');
Route::resource('compra', CompraController::class)->names('compra');
Route::resource('detallecompra', DetallecompraController::class)->names('detallecompra');

// Route::resource('notaentrada', notaentradaController::class)->names('notaentrada');
Route::resource('detalle_producto',DetalleProductoController::class)->names('detalle_producto');
Route::resource('provedor', ProvedorController::class)->names('provedor');
Route::resource('cliente', ClienteController::class)->names('cliente');
Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');

