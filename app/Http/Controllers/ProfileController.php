<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function read()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return response()->json([
            'status' => 200,
            'message' => 'Successfully got user profile data',
            'body' => [
                'email' => $user->email,
                'firstname' => $profile->firstname,
                'lastname' => $profile->lastname,
                'id' => $user->id
            ]
        ], 200);
    }
}
