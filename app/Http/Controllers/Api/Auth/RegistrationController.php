<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
           'first_name' => 'required',
           'last_name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:8',
           'password_confirmation' => 'required|same:password',
           'barangay_id' => 'required|exists:barangays,id',
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'barangay_id' => $validated['barangay_id'],
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
            'token' => $token
        ]);
    }
}
