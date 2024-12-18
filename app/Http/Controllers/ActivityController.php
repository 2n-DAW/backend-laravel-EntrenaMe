<?php

namespace App\Http\Controllers;

use App\Helpers\utils;
use App\Http\Requests\Activity\StoreActivityRequest;
use App\Models\Activity;


class ActivityController extends Controller
{


    public function store(StoreActivityRequest $request)
    {
        try {
            error_log('Creating activity');
            $validated = $request->validated();
            $validated['slug_activity'] = utils::getSlug($validated['n_activity']);
            error_log($validated['slug_activity']);
            $activity = Activity::create($validated);
            return response()->json($activity, 201);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error creating activity'], 500);
        }
    }
    
    public function getAll()
    {
        try {
            $activities = Activity::with(['instructor', 'sport'])->get();
    
            $resp = ['activities' => $activities];
            
            return response()->json($resp, 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error getting activities'], 500);
        }
    }
}