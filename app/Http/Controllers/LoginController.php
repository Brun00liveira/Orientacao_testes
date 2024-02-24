<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {

        $credentials = $request->only('email', 'password');

        if(!auth()->attempt($credentials)){
            return response()->json(['message' => 'Not Authorized'], 401);
        }
        $token = $request->User()->createToken('invoice', ['invoice-store'])->plainTextToken;
        return response()->json(['Authorized', 200, "token" => $token]);

    }
}
