<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Inputs',
                'error' => $validator->errors()
            ], 422);
        }

        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            $user = Auth::user();
            $token = $user->createToken('MyAppToken')->plainTextToken;
            $minutes = 1440;
            $timestamp = now()->addMinute($minutes);

            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'access_token' => $token,
                'token_type' => 'bearer',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Credentials',
            ], 400);
        }
    }
}
