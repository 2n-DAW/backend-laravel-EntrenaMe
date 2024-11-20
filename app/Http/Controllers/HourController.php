<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use App\Http\Requests\Hour\StoreHourRequest;

class HourController extends Controller
{


    public function store(StoreHourRequest $request)
    {
        try {
            $validated = $request->validated();
            $hour = Hour::create($validated);
            
            return response()->json($hour, 201);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error creating hour'], 500);
        }
    }
}
