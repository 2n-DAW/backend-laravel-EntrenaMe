<?php
namespace App\Helpers;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtUtils
{
    public static function generateToken($user)
    {
        $key = env('JWT_SECRET');

        $payload = [
            'iss' => "your-issuer", 
            'sub' => $user->id_user,
            'img_user' => $user->img_user,
            'id_user' => $user->id_user,
            'email' => $user->email, 
            'username' => $user->username, 
            'type_user' => $user->type_user,
            'iat' => time(), 
            'exp' => time() + env('JWT_EXPIRE_TIME')
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
    
    public static function decodeToken($token)
    {
        $key = env('JWT_SECRET');
        return JWT::decode($token, new Key($key, 'HS256'));
    }
}