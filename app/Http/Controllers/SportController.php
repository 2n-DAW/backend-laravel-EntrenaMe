<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Http\Requests\StoreSportRequest;

class SportController extends Controller
{
    protected Sport $sport;

    public function __construct(Sport $sport)
    {
        $this->sport = $sport;
    }

    public function store(StoreSportRequest $request)
    {
        error_log('store');
        $validatedData = $request->validated();

        $sport = $this->sport->create($validatedData);

        return response()->json($sport, 201);
    }
}