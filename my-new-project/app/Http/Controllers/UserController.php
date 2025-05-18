<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['user'] = new \App\Models\User()::all(); 
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    $data['user'] = new \App\Models\User(); 
    $data['route'] = 'dataevent.store'; 
    $data['method'] = 'post';
    // $data['titleForm'] = 'Form Input Event'; 
    // $data['submitButton'] = 'Submit';
    // return view('event/form_event', $data); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'user_id' => 'required',
        'signupyear' => 'required', 
        'serialnumber' => 'required', 
        'name' => 'required',
        'role' => 'required', 
        'address' => 'required',
        'phone_number' => 'required', 
        'email' => 'required', 
        'password' => 'required',  
        
    ]);

    $inputEvent = new \App\Models\User(); 
    $inputEvent->user_id = $request->user_id;
    $inputEvent->signupyear = $request->signupyear;  
    $inputEvent->serialnumber = $request->serialnumber; 
    $inputEvent->name = $request->name;
    $inputEvent->role = $request->role;  
    $inputEvent->address = $request->address; 
    $inputEvent->phone_number = $request->phone_number;
    $inputEvent->email = $request->email;  
    $inputEvent->password = $request->password; 
    $inputEvent->save();
    return redirect('dataevent/create'); 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
