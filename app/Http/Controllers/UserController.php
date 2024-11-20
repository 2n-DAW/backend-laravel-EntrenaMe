<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\dto\UserDTO;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        try {
            $validated = $request->validated();

            if (User::where('email', $validated['email'])->exists()) {
                return response()->json(['message' => 'Email is already taken'], 400);
            }

            if (User::where('username', $validated['username'])->exists()) {
                return response()->json(['message' => 'Username is already taken'], 400);
            }

            $hashedPassword = bcrypt($validated['password']);
            $user = User::create([
                'img_user' => $validated['img_user'],
                'email' => $validated['email'],
                'username' => $validated['username'],
                'password' => $hashedPassword,
                'type_user' => 'admin',
            ]);
            
            Admin::create([
                'id_user' => $user->id_user, 
            ]);
            
            $resp = UserDTO::registerDto($user);
            
            return response()->json( $resp, 201);
            
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to create user', 'error' => $e->getMessage()], 400);
        }
    }
}
