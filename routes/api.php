<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;


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
