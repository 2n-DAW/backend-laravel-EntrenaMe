<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;


//Route::resource('sports', SportController::class);

// Route::post('sports', function()
// {
//     return response()->json(['message' => 'Not Found'], 404);
// });

Route::post('sports', [SportController::class, 'store']); //Create sport
Route::get('sports', [SportController::class, 'getAll']); //Get all sports
