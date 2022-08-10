<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param email,password
     * return token,User object
     */
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']) )) {
            return response()->json([
                'error_message' => "Email and Password doesnt match in our database"
            ]);
        }

        $user = User::where('email',$request->email)->first();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}
