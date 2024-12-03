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
}