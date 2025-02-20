<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $info = $request->validated();
        $info['password'] = bcrypt($info['password']);
        User::create($info);

        return response()->json([
            'message' => 'User created successfully',
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $info = $request->validated();
        $user = User::where('email', $info['email'])->first();
        if (! $user || ! Auth::attempt($info)) {

            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
        $token = $user->createToken('authToken')->plainTextToken;
        $cookie = cookie('authToken', $token, 60 * 24, '/', null, false, true);

        return response()->json([
            'message' => 'User logged in successfully',
            'user' => new UserResource($user),
            'token' => $token,          // confirm this cookie-based or send token in response
        ], 200)->cookie($cookie);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'User logged out successfully',
        ], 200);
    }
}
