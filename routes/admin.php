<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProvedorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\BitacoraController;
<<<<<<< HEAD
use App\Http\Controllers\DetalleProductoController;
use App\Http\Controllers\notasalidaController;



=======
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetallecategoriaController;
use App\Http\Controllers\ProductodetalleController;
use App\Models\Categoria;
>>>>>>> 85ce47d1b68566c43023633ca027952685703763

Route::get("", [HomeController::class,"index"])->name("admin.home");

// Route::put('admin/users/{user}', 'UserController@update')->name('admin.users.update');


Route::resource('users', UserController::class)->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('empleado', EmpleadoController::class)->names('empleado');
Route::resource('producto', ProductoController::class)->names('producto');
<<<<<<< HEAD
Route::resource('notasalida', notasalidaController::class)->names('notasalida');

Route::resource('detalle_producto',DetalleProductoController::class)->names('detalle_producto');
=======
Route::resource('categoria', CategoriaController::class)->names('categoria');
Route::resource('detallecategoria', DetallecategoriaController::class)->names('detallecategoria');
Route::resource('productodetalle', ProductodetalleController::class)->names('productodetalle');


>>>>>>> 85ce47d1b68566c43023633ca027952685703763
Route::resource('provedor', ProvedorController::class)->names('provedor');
Route::resource('cliente', ClienteController::class)->names('cliente');
Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');

