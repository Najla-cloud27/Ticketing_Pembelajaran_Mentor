<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // ini melakukan pengecekkan email first itu memgambil data yang paling atas dan mirip
        $user = User::where('email', $request->email)->first();
        if (! user) {
            return response()->json([
                'message' => 'Email engga ketemu',
            ], 404);
        }

        if (! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Password Salah',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return response([
            'user'  => $user,
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response([
            'message' => 'Logout Berhasil',
        ], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'phone'    => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => $request->password,
        ]);

        return response([
            'user'  => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ], 200);
    }
}