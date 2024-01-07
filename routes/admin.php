<?php
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\DocenteMateriaController;



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\BitacoraController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin',function(){
        return view('admin.index');
    })->name('admin');
});

Route::get("", [HomeController::class,"index"])->name("admin.home");

Route::delete('/materia/{id}', [MateriaController::class, 'destroy'])->name('materia.destroy');
Route::delete('/docentemateria/{id}', [DocenteMateriaController::class, 'destroy'])->name('docentemateria.destroy');
Route::resource('materia', MateriaController::class)->names('materia');
Route::resource('docente', DocenteController::class)->names('docente');
Route::resource('docentemateria', DocenteMateriaController::class)->names('docentemateria');

