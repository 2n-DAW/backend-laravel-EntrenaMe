<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use App\Http\Requests\Hour\StoreHourRequest;
use App\Http\Requests\Hour\UpdateHourRequest;

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
    
    public function getAll()
    {
        try {
            $hours = Hour::all();
            return response()->json($hours, 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error getting hours'], 500);
        }
    }
    
    public function getById($id_hour)
    {
        try {
            $hour = Hour::find($id_hour);
            return response()->json($hour, 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error getting hour'], 500);
        }
    }
    
    public function update(UpdateHourRequest $request)
    {
        try {
            error_log($request);
            $validated = $request->validated();
            $id_hour = $validated['id_hour'];
            error_log('id_hour' . $id_hour);
            $hour = Hour::find($id_hour);
            $hour->update($validated);
            
            return response()->json($hour, 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error updating hour'], 500);
        }
    }
}
