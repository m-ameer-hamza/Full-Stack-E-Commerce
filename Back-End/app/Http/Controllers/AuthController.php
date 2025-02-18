<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(UserRequest $request){

       $userInfo = $request->validated();
        $userInfo['password'] = bcrypt($userInfo['password']);
        $userInfo['status'] = 'approved';
        $user = User::create($userInfo);
        $token = $user->createToken('authToken')->plainTextToken;
        //http-only cookie
        // Life time is set as 1 day
        $cookie=cookie('authToken',$token,60*24,'/',null,false,true);
        return response()->json([
            'message' => 'User Created Successfully',
            'user' => ['name' => $user->name, 'email' => $user->email, 'role' => $user->role]
        ], 201)->cookie($cookie);

    }
    public function login(LoginRequest $request){
        $userInfo = $request->validated();
        $user = User::where('email', $userInfo['email'])->first();
        if (!$user || !Auth::attempt($userInfo)) {
            return response()->json([
                'message' => 'Invalid Credentials',
            ], 401);
        }
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'message' => 'Login Success',
            'token' => $token,
            'user' => ['name' => $user->name, 'email' => $user->email, 'role' => $user->role]
        ], 200);
    }


    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out'
        ], 200);
    }
}
