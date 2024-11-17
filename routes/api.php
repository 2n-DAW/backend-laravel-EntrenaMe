<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
Route::resource('students', StudentController::class);

Route::post('test', function (Request $request) {
    error_log("test");
    return response()->json([
        'message' => 'Hello World!'
    ], 200);
});
