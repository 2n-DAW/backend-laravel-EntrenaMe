<?php

namespace App\Http\Controllers;

use App\Models\CourtHour;
use App\Http\Requests\CourtHour\StoreCourtHourRequest;

class CourtHourController extends Controller
{


    public function store(StoreCourtHourRequest $request)
    {
        try {
            $validated = $request->validated();
            
            $court = CourtHour::create($validated);
            error_log('store' . $court);
            return response()->json($court, 201);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error creating court'], 500);
        }
    }
    
public function getAll()
{
    try {
        $courts = CourtHour::with(['Court', 'Hour'])->get();
        return response()->json($courts, 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error fetching courts'], 500);
    }
}
}