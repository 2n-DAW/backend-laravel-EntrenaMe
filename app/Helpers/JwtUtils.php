<?php
namespace App\Helpers;
use Firebase\JWT\JWT;
class JwtUtils
{
    public static function generateToken($user)
    {
        //$key = env('JWT_SECRET');
        $key = 'yeMoreno';
        $payload = [
            'iss' => "your-issuer", 
            'sub' => $user->id_user, 
            'email' => $user->email, 
            'username' => $user->username, 
            'type_user' => $user->type_user,
            'iat' => time(), 
            'exp' => time() + 60*60 
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
}