<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RestaurantApiController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'restaurants' => Restaurant::all()
        ]);
    }

public function store(Request $request): JsonResponse
{
    $validated = $request->validate([
        'restaurant_id'     => 'required|integer|unique:Restaurant,restaurant_id',
        'name'              => 'required|string',
        'country'           => 'required|string',
        'city'              => 'required|string',
        'street'            => 'required|string',
        'building'          => 'nullable|string',
        'phone_number'      => 'nullable|string',
        'category'          => 'nullable|string',
        'open_time'         => 'nullable|date_format:H:i:s',
        'close_time'        => 'nullable|date_format:H:i:s',
        'seating_capacity'  => 'nullable|integer',
    ]);

    $restaurant = Restaurant::create($validated);

    return response()->json([
        'message' => 'Restaurant created successfully',
        'data' => $restaurant
    ], 201);
}

}
