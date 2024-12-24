<?php

namespace App\Http\Controllers;

use App\Models\CourtHour;
use App\Http\Requests\CourtHour\StoreCourtHourRequest;
use App\Http\Requests\CourtHour\UpdateCourtHourRequest;
use Illuminate\Http\Request;

class CourtHourController extends Controller
{


    public function store(StoreCourtHourRequest $request)
    {
        try {
            $validated = $request->validated();
            $court = CourtHour::create($validated);
            return response()->json($court, 201);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error creating court_hour'], 500);
        }
    }

    public function getAll()
    {
        try {
            $courts_hours = CourtHour::with(['Court', 'Hour'])->get();

            $resp = ['courts_hours' => $courts_hours];

            return response()->json($resp, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching courts_hours'], 500);
        }
    }

    public function getById($id_court_hour)
    {
        try {
            $court = CourtHour::with(['Court', 'Hour'])->find($id_court_hour);
            return response()->json($court, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching court_hour'], 500);
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
            return response()->json(['error' => 'Error updating court_hour'], 500);
        }
    }

    public function delete($id_court_hour)
    {
        try {
            $court = CourtHour::find($id_court_hour);
            $court->delete();
            return response()->json($court, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting court_hour'], 500);
        }
    }

    public function getByCourtId($id_court)
    {
        try {
            $courts = CourtHour::with(['Court', 'Hour'])->where('id_court', $id_court)->get();
            return response()->json($courts, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching court_hour'], 500);
        }
    }

    public function getByHourId($id_hour)
    {
        try {
            $courts = CourtHour::with(['Court', 'Hour'])->where('id_hour', $id_hour)->get();
            return response()->json($courts, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching court_hour'], 500);
        }
    }
    
    public function createByArray(Request $request)
    {
        error_log(print_r($request->all(), true));
        try {
            $validated = $request->validate([
                'courts_hours' => 'required|array',
                'courts_hours.*.id_court' => 'required|integer|exists:courts,id_court',
                'courts_hours.*.id_hour' => 'required|integer',
                'courts_hours.*.day_number' => 'required|integer|between:1,31',
                'courts_hours.*.id_month' => 'required|integer|between:1,12',
                'courts_hours.*.year' => 'required|integer'
            ]);
    
            $created_hours = collect($validated['courts_hours'])->map(function ($court_hour) {
                return CourtHour::create([
                    'id_court' => $court_hour['id_court'],
                    'id_hour' => $court_hour['id_hour'],
                    'day_number' => $court_hour['day_number'],
                    'id_month' => $court_hour['id_month'],
                    'year' => $court_hour['year']
                ]);
            });
    
            return response()->json([
                'courts_hours' => $created_hours
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear los horarios de pista',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    public function deleteByArray(Request $request)
    {
        try {
            $validated = $request->validate([
                'courts_hours' => 'required|array',
                'courts_hours.*.id_court_hour' => 'required|integer|exists:courts_hours,id_court_hour',
            ]);
    
            $deleted_hours = collect($validated['courts_hours'])->map(function ($court_hour) {
                $courtHour = CourtHour::findOrFail($court_hour['id_court_hour']);
                $courtHour->delete();
                return $courtHour;
            });
    
            return response()->json([
                'courts_hours' => $deleted_hours
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar los horarios de pista',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    
    
}
