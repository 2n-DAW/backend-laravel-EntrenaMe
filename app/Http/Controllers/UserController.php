<?php

namespace App\Http\Controllers;

use App\Helpers\JwtUtils;
use App\Models\User;
use App\Models\Admin;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\dto\UserDTO;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


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

            return response()->json($resp, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to create user', 'error' => $e->getMessage()], 400);
        }
    }


    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            if (!Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Invalid password'], 401);
            }

            $token_jwt = JwtUtils::generateToken($user);

            $user->token = $token_jwt;
            
            $user = UserDTO::loginDto($user, $token_jwt);

            return response()->json($user, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to login user', 'error' => $e->getMessage()], 400);
        }
    }

    public function gerCurrentUser(Request $request)
    {
        try {
            $user_token = $request->attributes->get('user');
    
            if (!$user_token) {
                return response()->json(['message' => 'User data not found'], 400);
            }
            
            $user = User::with(['admin'])->where('id_user', $user_token->id_user)->first();

            $user = UserDTO::userDto($user);
    
            return response()->json($user, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to get current user', 'error' => $e->getMessage()], 400);
        }
    }
    
    public function getInstructors()
    {
        try {
            $instructors = User::with(['instructor'])->where('type_user', 'instructor')->get();
    
            $instructors = UserDTO::instructorsDto($instructors);
            
            return response()->json([
                'instructors' => $instructors
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to get instructors', 'error' => $e->getMessage()], 400);
        }
    }
}
