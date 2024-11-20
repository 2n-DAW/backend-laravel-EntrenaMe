<?php

namespace App\Http\Controllers;

use App\Models\CourtHour;
use App\Http\Requests\CourtHour\StoreCourtHourRequest;
use App\Http\Requests\CourtHour\UpdateCourtHourRequest;

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

    public function getById($id_court_hour)
    {
        try {
            $court = CourtHour::with(['Court', 'Hour'])->find($id_court_hour);
            return response()->json($court, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching court'], 500);
        }
    }
    
     public function update(UpdateCourtHourRequest $request)
    {
        try {
            $validated = $request->validated();
            $court = CourtHour::with(['Court', 'Hour'])->find($validated['id_court_hour']);
            $court->update($validated);
            return response()->json($court, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating court'], 500);
        }
    }
    
      public function delete($id_court_hour)
    {
        try {
            $court = CourtHour::find($id_court_hour);
            $court->delete();
            return response()->json($court, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting court'], 500);
        }
    }
    
}
