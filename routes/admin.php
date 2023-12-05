<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\PagoController;
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
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\DetalleventaController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('/productos',ProductoController::class);
    Route::get('/admin',function(){
        return view('admin.index');
    })->name('admin');
});

Route::get("", [HomeController::class,"index"])->name("admin.home");

// Route::put('admin/users/{user}', 'UserController@update')->name('admin.users.update');
Route::get('categoria/pdf', [CategoriaController::class, 'pdf'])->name('categoria.pdf');
Route::get('detalleventa/pdf', [DetalleventaController::class, 'pdf'])->name('detalleventa.pdf');
Route::get('venta/pdf', [VentaController::class, 'pdf'])->name('venta.pdf');
Route::get('compra/pdf', [CompraController::class, 'pdf'])->name('compra.pdf');

Route::get('detalleventa/pdfqr', [DetalleventaController::class, 'pdfqr'])->name('detalleventa.pdfqr');
Route::get('detalleventa/verdetalle/{venta}', [DetalleventaController::class, 'verdetalle'])->name('detalleventa.verdetalle');
Route::delete('detalleventa/eliminar/{id}', [DetalleventaController::class, 'eliminar'])->name('detalleventa.eliminar');

Route::get('detallecompra/verdetalle/{compra}', [DetallecompraController::class, 'verdetalle'])->name('detallecompra.verdetalle');
Route::delete('detallecompra/eliminar/{id}', [DetallecompraController::class, 'eliminar'])->name('detallecompra.eliminar');


Route::get('venta/reporte', [VentaController::class, 'reporte'])->name('venta.reporte');

Route::get('compra/reporte', [CompraController::class, 'reporte'])->name('compra.reporte');
Route::get('venta/bitacora', [BitacoraController::class, 'reporte'])->name('bitacora.reporte');

Route::get('detallecompra/vistaañadir', [DetallecompraController::class, 'vistaañadir'])->name('detallecompra.vistaañadir');
Route::post('detallecompra/añadir', [DetallecompraController::class, 'añadir'])->name('detallecompra.añadir');


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
Route::resource('detalleventa', DetalleventaController::class)->names('detalleventa');

// Route::resource('notaentrada', notaentradaController::class)->names('notaentrada');
// Route::resource('detalle_producto',DetalleproductoController::class)->names('detalle_producto');
Route::resource('provedor', ProvedorController::class)->names('provedor');
Route::resource('cliente', ClienteController::class)->names('cliente');
Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');


Route::get('/ruta/del/backend/para/obtener/producto/{codigo}', [ProductoController::class, 'obtenerDetallesProducto']);

//Route::get('pago', PagoController::class)->names('pago');
Route::get('pago', [PagoController::class, 'index'])->name('pago.index');
Route::get('inventario', [InventarioController::class, 'index'])->name('inventario.index');
