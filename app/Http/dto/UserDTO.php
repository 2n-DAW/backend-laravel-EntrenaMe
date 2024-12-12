<?php
namespace App\Http\dto;
class UserDTO
{
    
    public static function registerDto($user)
    {
        return [
            'img_user' => $user->img_user,
            'email' => $user->email,
            'username' => $user->username,
            'type_user' => $user->type_user,
        ];
    }
    
    public static function loginDto($user, $token)
    {
        return [
            'img_user' => $user->img_user,
            'email' => $user->email,
            'username' => $user->username,
            'type_user' => $user->type_user,
            'token' => $token,
        ];
    }
    
    public static function userDto($user)
    {
        return [
            'img_user' => $user->img_user,
            'email' => $user->email,
            'username' => $user->username,
            'type_user' => $user->type_user,
            'admin' => [
                'id_admin' => $user->admin->id_admin,
                'id_user' => $user->admin->id_user,
            ],
        ];
    }
}