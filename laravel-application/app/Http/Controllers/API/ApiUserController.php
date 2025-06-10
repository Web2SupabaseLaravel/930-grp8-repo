<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();
        return response()->json($user);
    }

    public function update(Request $request, $user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();

        $request->validate([
            'name'  => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:user,email,' . $user_id . ',user_id',
        ]);

        $user->update($request->only(['name', 'email', 'address', 'phone_number', 'role']));

        return response()->json(['message' => 'User updated', 'user' => $user]);
    }

    public function destroy($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();
        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }
}
