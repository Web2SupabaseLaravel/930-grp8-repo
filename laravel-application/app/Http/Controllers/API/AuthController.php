<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // return response()->json([
        //     'access_token' => $token,
        //     'token_type' => 'bearer',
        //     'expires_in' => auth()->factory()->getTTL() * 60
        // ]);
        return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60,
        'user' => auth()->user(), // ← إضافة معلومات المستخدم
        ]);

    }




    public function logout()
    {
        Auth::guard('api')->logout();
        return response()->json(['message' => 'تم تسجيل الخروج']);
    }

    // public function me()
    // {
    //     return response()->json(Auth::guard('api')->user());
    // }
    public function user()
{
    return response()->json(Auth::guard('api')->user());
}


    public function refresh()
    {
        $token = Auth::guard('api')->refresh();

        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
