<?php

namespace App\Http\Controllers;

use App\Helpers\utils;
use App\Models\Sport;
use App\Http\Requests\Sport\StoreSportRequest;
use App\Http\Requests\Sport\UpdateSportRequest;

class SportController extends Controller
{
    

public function store(StoreSportRequest $request)
{
    try {
        $validated = $request->validated();
        $validated['slug_sport'] = utils::getSlug($validated['n_sport']);

        $sport = Sport::create($validated);
        error_log('store' . $sport);
        return response()->json($sport, 201);
        
    } catch (\Exception $e) {
        error_log($e->getMessage());
        return response()->json(['error' => 'Error creating sport'], 500);
    }
}

    
    public function getAll() 
    {
        try {
            $sports = Sport::all();
            
            $resp = ['sports' => $sports];
            
            return response()->json($resp, 200);
        } catch (\Exception $e) {
            error_log( $e->getMessage());
            return response()->json(['error' => 'Error getting sports'], 500);
        }
    }
    
    public function getById($id_sport)
    {
        try {
            $sport = Sport::find($id_sport);
            error_log('getById' . $sport);
            return response()->json($sport, 200);
        } catch (\Exception $e) {
            error_log( $e->getMessage());
            return response()->json(['error' => 'Error getting sport'], 500);
        }
    }
    
    public function getBySlug($slug_sport)
    {
        try {
            $sport = Sport::where('slug_sport', $slug_sport)->first();
            error_log('getBySlug' . $sport);
            return response()->json($sport, 200);
        } catch (\Exception $e) {
            error_log( $e->getMessage());
            return response()->json(['error' => 'Error getting sport'], 500);
        }
    }
    
    public function update(UpdateSportRequest $request)
    {
        try {
            $id_sport = $request->input('id_sport');
            error_log('id_sport' . $id_sport);
            
            $sport = Sport::find($id_sport);
            $sport->update($request->validated());
            error_log('update' . $sport);
            return response()->json($sport, 200);
        } catch (\Exception $e) {
            error_log( $e->getMessage());
            return response()->json(['error' => 'Error updating sport'], 500);
        }
    }
    
    public function delete($id_sport)
    {
        try {
            $sport = Sport::find($id_sport);
            $sport->delete();
            
            error_log('delete' . $sport);
            return response()->json($sport, 200);
        } catch (\Exception $e) {
            error_log( $e->getMessage());
            return response()->json(['error' => 'Error deleting sport'], 500);
        }
    }
    
}
