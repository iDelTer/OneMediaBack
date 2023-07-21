<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// app/Http/Controllers/AuthController.php
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'user'
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
    {
        Log::info('Login request received', ['request_data' => $request->all()]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            Log::warning('Invalid login attempt', ['email' => $request->input('email')]);

            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada exitosamente']);
    }

    public function forgotten(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'new_password' => 'required|string|min:8',
        ]);

        $user = User::find($request->id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return response()->json(['message' => 'Password updated successfully']);
    }

    public function account(Request $request)
    {
        $user = $request->user()->load('lists', 'completedMovie', 'liked');

        // No devolver list, sino devolver list_items, pero necesitamos hacer inner join para eso
        // No devolver completeds, sino devolver list_items, pero necesitamos hacer inner join para eso
        return response()->json([
            'user' => $user,
            'lists' => $user->lists,
            'completeds' => [
                'movies' => $user->completedMovie,
                'series' => $user->completedMovie,
                'games' => $user->completedMovie,
            ],
            'likeds' => $user->liked,
        ]);
    }

    public function askauth(Request $request)
    {
        $user = $request->user();

        $messageStatus = $user->role == 'admin' ? 200 : 404;

        // No devolver list, sino devolver list_items, pero necesitamos hacer inner join para eso
        // No devolver completeds, sino devolver list_items, pero necesitamos hacer inner join para eso
        return response()->json([
            'status' => $messageStatus,
        ], $messageStatus);
    }

    // public function account(Request $request)
    // {
    //     return $request->user();
    // }
}
