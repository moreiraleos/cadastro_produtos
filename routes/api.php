<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;

Route::middleware('api')->group(function () {
    Route::get('/', function () {
        return 'API está funcionando!';
    });

});