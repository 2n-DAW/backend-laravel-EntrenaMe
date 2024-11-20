<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\HourController;


// Route::post('sports', function()
// {
//     return response()->json(['message' => 'Not Found'], 404);
// });

Route::prefix('sports')->group(function () {
    Route::post('/', [SportController::class, 'store']); //Create sport
    Route::get('/', [SportController::class, 'getAll']); //Get all sports
    Route::get('/{id}', [SportController::class, 'getById']); //Get sport by id
    Route::get('/slug/{slug}', [SportController::class, 'getBySlug']); //Get sport by slug
    Route::put('/', [SportController::class, 'update']); //Update sport by id
    Route::delete('/{id}', [SportController::class, 'delete']); //Delete sport by id
});

Route::prefix('courts')->group(function () {
    Route::post('/', [CourtController::class, 'store']); //Create court
    Route::get('/', [CourtController::class, 'getAll']); //Get all courts
    Route::get('/{id}', [CourtController::class, 'getById']); //Get court by id
    Route::get('/slug/{slug}', [CourtController::class, 'getBySlug']); //Get court by slug
    Route::put('/', [CourtController::class, 'update']); //Update court by id
    Route::delete('/{id}', [CourtController::class, 'delete']); //Delete court by id
});

Route::prefix('hours')->group(function () {
    Route::post('/', [HourController::class, 'store']); //Create hours
    Route::get('/', [HourController::class, 'getAll']); //Get all hours
    Route::get('/{id}', [HourController::class, 'getById']); //Get hour by id
    Route::put('/', [HourController::class, 'update']); //Update hour by id
});