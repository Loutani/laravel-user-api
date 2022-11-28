<?php

namespace App\Http\Controllers;

use App\Models\Profile;
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
                'firstName' => $profile->firstName,
                'lastName' => $profile->lastName,
                'id' => $user->id
            ]
        ], 200);
    }

    /**
     * update user profile data
     * 
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $userProfile = Profile::find(Auth::user()->id);

        $userProfile->firstName = $request->firstName;
        $userProfile->lastName = $request->lastName;

        $userProfile->save();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully update user profile data',
        ], 200);
    }
}
