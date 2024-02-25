<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(AuthUserRequest $request) {
        try {
            $credentials = $request->only('email', 'password');

            if(!auth()->attempt($credentials)){
                return response()->json(['message' => 'Not Authorized'], 401);
            }

            $token = auth()->user()->createToken('invoice', ['invoice-store'])->plainTextToken;
            return response()->json(['message' => 'Authorized', 'token' => $token], 200);
        } catch (\Exception $e) {
            Log::error('Error during login: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred during login'], 500);
        }
    }
}
