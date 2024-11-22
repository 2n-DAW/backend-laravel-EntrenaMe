<?php

namespace App\Http\Controllers;

use App\Helpers\JwtUtils;
use App\Models\User;
use App\Models\Admin;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


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
    

public function login(Request $request)
{
    try {
        $user = User::where('email', $request->email)->first();
        
        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        
        if(!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid password'], 401);
        }
        
        $token_jwt = JwtUtils::generateToken($user);
        
        $user->token = $token_jwt;
        
        return response()->json($user, 200);
        
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error to login user', 'error' => $e->getMessage()], 400);
    }
}
}
