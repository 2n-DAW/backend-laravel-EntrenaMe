<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\CourtHourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\MonthController;


// Route::post('sports', function()
// {
//     return response()->json(['message' => 'Not Found'], 404);
// });

// Route::group(['middleeare' => ['cors' , 'admin']], function () {
    //Rutas a las que se permitirá acceso

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
    Route::delete('/{id}', [HourController::class, 'delete']); //Delete hour by id
});

Route::prefix('courtsHours')->group(function () {
    Route::post('/', [CourtHourController::class, 'store']); //Create court hours
    Route::get('/', [CourtHourController::class, 'getAll']); //Get all court hours
    Route::get('/{id}', [CourtHourController::class, 'getById']); //Get court hour by id
    Route::put('/', [CourtHourController::class, 'update']); //Update court hour by id
    Route::delete('/{id}', [CourtHourController::class, 'delete']); //Delete court hour by id
    Route::get('/court/{id_court}', [CourtHourController::class, 'getByCourtId']); //Get court hours by court id
    Route::get('/hour/{id_hour}', [CourtHourController::class, 'getByHourId']); //Get court hours by hour id
});



Route::prefix('activities')->group(function(){
    Route::post('/', [ActivityController::class, 'store']);
    Route::get('/', [ActivityController::class, 'getAll']);
});

Route::prefix('months')->group(function(){
    Route::post('/', [MonthController::class, 'store']);
});

// });


Route::prefix('user')-> group(function(){
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
});