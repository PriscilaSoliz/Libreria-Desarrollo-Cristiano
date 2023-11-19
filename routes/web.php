<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\EmpleadoController;
// use App\Http\Controllers\ProductoController;
// use App\Http\Controllers\ClienteController;
// use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\Admin\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // route::delete('/producto',ProductoController::class)->name('productos.eliminar');
    // route::resource('producto',ProductoController::class)->names('producto');
    // route::resource('cliente',ClienteController::class)->names('cliente');


    // route::resource('producto',ProductoController::class)->names('producto.idex');
    // Route::get('/empleado',[EmpleadoController::class,'index'])->name('empleado.index');
   //  Route::get('/producto',[ProductoController::class,'index'])->name('producto.index');
    // Route::delete('{$id}',[ProductoController::class,'index'])->name('producto.eliminar');
});
