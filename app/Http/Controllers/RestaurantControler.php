<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['Restaurant'] = new \App\Models\Restaurant()::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['Restaurant'] = new \App\Models\Restaurant(); 
        $data['route'] = 'datarestaurant.store'; 
        $data['method'] = 'post';
        #$data['titleForm'] = 'Form Input Event'; 
        #$data['submitButton'] = Submit;
        #return view('event/form_event', $data); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'name' => 'required', 
            'restaurant_id' => 'required',
            'country' => 'required', 
            'city' => 'required',
            'street' => 'required',
            'building' => 'required',
            'phone_number' => 'required',
            'category' => 'required',
            'close_time' => 'required',
            'open_time' => 'required',
            'seating_capacity' => 'required',
            ]);

        $inputEvent = new \App\Models\Restaurant(); 
        $inputEvent->name = $request->name;
        $inputEvent->restaurant_id = $request->restaurant_id;  
        $inputEvent->country = $request->country; 
        $inputEvent->city = $request->city; 
        $inputEvent->street = $request->street;
        $inputEvent->building = $request->building;
        $inputEvent->phone_number = $request->phone_number;
        $inputEvent->category = $request->category;
        $inputEvent->close_time = $request->close_time;
        $inputEvent->open_time = $request->open_time;
        $inputEvent->seating_capacity = $request->seating_capacity;
        $inputEvent->save();
        return redirect('datarestaurant'); 

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
