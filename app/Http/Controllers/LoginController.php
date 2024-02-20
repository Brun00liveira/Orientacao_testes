<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
        public function login(Request $request) {

            $credentials = $request->only('email', 'password');

            if(!auth()->attempt($credentials)){
                return response()->json(['message' => 'Not Authorized', 'status'  => 403]);
            }
            $token = $request->User()->createToken('invoice', ['invoice-store'])->plainTextToken;
            return response()->json(['Authorized', 200, "token" => $token]);

        }

        public function teste() {

            if(!request()->user()->tokenCan('invoice-store'))
            {
                return response()->json('Unauthorization', 403);
            }

            return "Rota autenticada";
        }
}
