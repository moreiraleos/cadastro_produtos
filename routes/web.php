<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Categorias
Route::get("/categorias", [App\Http\Controllers\ControladorCategoria::class, 'index']);
Route::get("/categorias/novo", [App\Http\Controllers\ControladorCategoria::class, 'create']);
Route::post("/categorias", [App\Http\Controllers\ControladorCategoria::class, 'store']);
Route::get("/categorias/apagar/{id}", [App\Http\Controllers\ControladorCategoria::class, 'destroy']);
Route::get("/categorias/editar/{id}", [App\Http\Controllers\ControladorCategoria::class, 'edit']);
Route::post("/categorias/{id}", [App\Http\Controllers\ControladorCategoria::class, 'update']);

// Produtos
Route::get("/produtos", [App\Http\Controllers\ControladorProduto::class, 'indexView']);
Route::get("/produtos/novo", [App\Http\Controllers\ControladorProduto::class, 'create']);
Route::post('/produtos', [App\Http\Controllers\ControladorProduto::class, 'store']);

Route::get("/produtos/editar/{id}", [App\Http\Controllers\ControladorProduto::class, 'edit']);
Route::post("/produtos/{id}", [App\Http\Controllers\ControladorProduto::class, 'update']);
Route::get("/produtos/apagar/{id}", [App\Http\Controllers\ControladorProduto::class, 'destroy']);