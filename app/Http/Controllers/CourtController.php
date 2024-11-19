<?php

namespace App\Http\Controllers;

use App\Helpers\utils;
use App\Models\Court;
use App\Http\Requests\Court\StoreCourtRequest;
use App\Http\Requests\Court\UpdateCourtRequest;

class CourtController extends Controller
{


    public function store(StoreCourtRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['slug_court'] = utils::getSlug($validated['n_court']);
            $court = Court::create($validated);
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
            $courts = Court::all();
            return response()->json($courts, 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error getting courts'], 500);
        }
    }

    public function getById($id_court)
    {
        try {
            $court = Court::Where('id_court', $id_court)->first();

            return response()->json($court, 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error getting court'], 500);
        }
    }

    public function getBySlug($slug_court)
    {
        try {
            $court = Court::Where('slug_court', $slug_court)->first();
            return response()->json($court, 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error getting court'], 500);
        }
    }
    
    public function update(UpdateCourtRequest $request)
    {
        try {
            $id_court = $request->input('id_court');
            error_log('id_court' . $id_court);
            
            $court = Court::Where('id_court', $id_court)->first();
            error_log('court' . $court);
            
            $court->update($request->validated());
            error_log('update' . $court);
            
            return response()->json($court, 200);
        } catch (\Exception $e) {
            error_log( $e->getMessage());
            return response()->json(['error' => 'Error updating court'], 500);
        }
    }
}