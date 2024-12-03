<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Http\Requests\Month\StoreMonthRequest;

class MonthController extends Controller
{


    public function store(StoreMonthRequest $request)
    {
        try {
            $validated = $request->validated();
            $month = Month::create($validated);
            
            return response()->json($month, 201);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json(['error' => 'Error creating month'], 500);
        }
    }
}