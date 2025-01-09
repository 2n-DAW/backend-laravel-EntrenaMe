<?php

namespace App\Http\Controllers;

use App\Helpers\utils;
use App\Http\Requests\Activity\StoreActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
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
    
    public function getById($id)
    {
        try {
            $activity = Activity::with(['instructor', 'sport'])->find($id);
            if ($activity) {
                return response()->json($activity, 200);
            } else {
                return response()->json(['error' => 'Activity not found'], 404);
            }
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error getting activity'], 500);
        }
    }
    
    public function update(UpdateActivityRequest $request)
    {
        try {
            $validated = $request->validated();
            $activity = Activity::with(['instructor', 'sport'])->find($validated['id_activity']);
            if ($activity) {
                $activity->update($validated);
                return response()->json($activity, 200);
            } else {
                return response()->json(['error' => 'Activity not found'], 404);
            }
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error updating activity'], 500);
        }
    }
    
    public function delete($id)
    {
        try {
            $activity = Activity::find($id);
            if ($activity) {
                $activity->delete();
                return response()->json(['message' => 'Activity deleted'], 200);
            } else {
                return response()->json(['error' => 'Activity not found'], 404);
            }
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error deleting activity'], 500);
        }
    }
}