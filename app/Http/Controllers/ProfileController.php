<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * read user profile data
     * 
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return response()->json([
            'status' => 200,
            'message' => 'Successfully got user profile data',
            'body' => [
                'email' => $user->email,
                'firstname' => $profile->firstName,
                'lastname' => $profile->lastName,
                'id' => $user->id
            ]
        ], 200);
    }
}
