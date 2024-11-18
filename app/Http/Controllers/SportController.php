<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Http\Requests\StoreSportRequest;


class SportController extends Controller
{
    public function store(StoreSportRequest $request)
    {
        try {
            $sport = Sport::create($request->validated());
            error_log('store' . $sport);
            return response()->json($sport, 201);
        } catch (\Exception $e) {
            error_log( $e->getMessage());
            return response()->json(['error' => 'Error creating sport'], 500);
        }
    }
}
