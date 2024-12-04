<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{

    public function handle(Request $request, Closure $next)
    {
        try {
            if (auth('api')->user() == null || auth('api')->user()->IDrol != 2) {
                return response()->json([
                    "error" => "Unauthorized",
                ], 401);
            }
            return $next($request);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => "Unauthorized",
            ], 401);
        }
    }
}
