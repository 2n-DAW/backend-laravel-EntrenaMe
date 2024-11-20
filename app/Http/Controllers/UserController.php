<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\User\RegisterUserRequest;

class UserController extends Controller
{


    public function register(RegisterUserRequest $request)
    {
        try {
            $validated = $request->validated();
            $hasshedPassword = bcrypt($validated['password']);
            $user = User::create([
                'img_user' => $validated['img_user'],
                'email' => $validated['email'],
                'username' => $validated['username'],
                'password' => $hasshedPassword,
                'type_user' => 'admin',
            ]);
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error to create user', 'error' => $e->getMessage()], 400);
        }
    }
}
