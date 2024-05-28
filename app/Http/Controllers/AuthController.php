<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register (Request $request) {
        $payload = $request->validate([
            'role' => 'required|string|unique:users',
            'name' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);
        $user = User::create([
            'role' => $payload['role'],
            'name' => $payload['name'],
            'email' => $payload['email'],
            'password' => Hash::make($payload['password']),
        ]);

        if($user)
            return response()->json(['message' => 'Created succesfuly'], 200);

        return response()->json(['message' => 'An error occured, please try again'], 401);
    }

    public function login(Request $request){
        $payload = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('name', $payload['name'])->first();
        if(!$user || !Hash::check($payload['password'], $user->password)){
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out succesfuly'], 200);
    }
}
