<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::all(); 
        return $restaurant;
    }

    public function create()
    {
        return response()->json(['message' => 'Create form not available in API'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
        ]);

        $restaurant = Restaurant::create($validated);

        return response()->json([
            'message' => 'Restaurant created successfully!',
            'data' => $restaurant
        ], 201);
    }
}
