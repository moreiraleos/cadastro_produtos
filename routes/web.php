<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get("/produtos", [App\Http\Controllers\ControladorProduto::class, 'index']);
Route::get("/categorias", [App\Http\Controllers\ControladorCategoria::class, 'index']);

Route::get("/categorias/novo", [App\Http\Controllers\ControladorCategoria::class, 'create']);
Route::post("/categorias", [App\Http\Controllers\ControladorCategoria::class, 'store']);

Route::get("/categorias/apagar/{id}", [App\Http\Controllers\ControladorCategoria::class, 'destroy']);
Route::get("/categorias/editar/{id}", [App\Http\Controllers\ControladorCategoria::class, 'edit']);

Route::post("/categorias/{id}", [App\Http\Controllers\ControladorCategoria::class, 'update']);