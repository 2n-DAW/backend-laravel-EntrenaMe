<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\JwtUtils;
use Firebase\JWT\ExpiredException;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {
        try {

            $authHeader = $request->header('Authorization');
            
            if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
                return response()->json([
                    "error" => "Token not provided or invalid format",
                ], 401);
            }

            $token = substr($authHeader, 7); // Remover "Bearer "

            // Decodificar el token
            $decodedToken = JwtUtils::decodeToken($token);

            // Verificar si el tipo de usuario es admin
            if ($decodedToken->type_user != 'admin') {
                return response()->json([
                    "error" => "Unauthorized",
                ], 401);
            }

            // Continuar con la solicitud
            return $next($request);
        } catch (ExpiredException $e) {
            return response()->json([
                "error" => "Token expired",
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Unauthorized",
            ], 401);
        }
    }
}
