<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/productos/index', [ProductosController::class, 'index'])->name('productos.index');

Route::get('/productos/crear', [ProductosController::class, 'create'])->name('productos.create');

Route::post('/productos/store', [ProductosController::class, 'store'])->name('productos.store');

Route::get('/productos/editar/{id}', [ProductosController::class, 'edit'])->name('productos.edit');

Route::put('/productos/update/{id}', [ProductosController::class, 'update'])->name('productos.update');

Route::delete('/productos/borrar/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');