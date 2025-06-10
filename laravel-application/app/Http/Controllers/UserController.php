<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));

    }

    public function create()
    {
        // $data['user'] = new User();
        // $data['route'] = route('user.store');
        // $data['method'] = 'post';
        // return view('user.form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'signupyear' => 'required',
            'serialnumber' => 'required',
            'name' => 'required',
            'role' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->user_id = $request->user_id;
        $user->signupyear = $request->signupyear;
        $user->serialnumber = $request->serialnumber;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully!');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit(string $id)
    {
        $data['user'] = User::findOrFail($id);
        $data['route'] = route('user.update', $id);
        $data['method'] = 'put';
        return view('user.form', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->except('_token', '_method'));

        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}
