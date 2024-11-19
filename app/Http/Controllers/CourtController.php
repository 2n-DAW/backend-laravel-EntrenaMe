<?php

namespace App\Http\Controllers;

use App\Helpers\utils;
use App\Models\Court;
use App\Http\Requests\Court\StoreCourtRequest;

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
            return response()->json(['error' => 'Error creating sport'], 500);
        }
    }
}
