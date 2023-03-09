<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * login the User and return the jwt token
     * 
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);

        if(!$token) {
            return response()->json([
                'status' => 400,
                'message' => 'Error in login user',
                'body' => NULL
            ], 400);
        }

        return response()->json([
                'status'    => 200,
                'message'   => 'User successfully logged in',
                'body'      => [
                    'token' => $token
                ]
            ]);
    }
}