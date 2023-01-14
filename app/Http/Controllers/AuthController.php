<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        if(!$request->validate(['email' => 'required|email|unique:users',])){
            return response()->json([
                'status' => 'error',
                'message' => 'Email already exists',
                'data' => null,
                'token' => null,
                'token_type' => null,
            ], 400);
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $user = User::create($data);
        $token = $user->createToken('auth')->plainTextToken;
        if($user){
            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
                'data' => $user,
                'token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'User not created',
                'data' => null,
                'token' => null,
                'token_type' => null,
            ], 400);
        }
    }
    public function login(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(!auth()->attempt($data)){
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
                'data' => null,
                'token' => null,
                'token_type' => null,
            ], 400);
        }
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('auth')->plainTextToken;
        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'data' => $user,
            'token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }
    public function logout(Request $request){
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User logged out successfully',
            'data' => null,
            'token' => null,
            'token_type' => null,
        ], 200);
    }
}
