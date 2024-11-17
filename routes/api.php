<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;

//Route::post('/sports', [SportController::class, 'store']);

Route::get('/example', function () {
    error_log("Mensaje de ");
    return 'Página encontrada';
});

Route::post('/sports', function () {
    error_log("Mensaje de Post");
    return 'Página GET encontrada';
});
