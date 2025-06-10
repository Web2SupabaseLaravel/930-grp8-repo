<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
{
    $restaurants = Restaurant::all(); 
    return view('Restaurant.index', compact('restaurants'));
}

    public function create()
    {
        $data['Restaurant'] = new Restaurant(); 
        $data['route'] = route('datarestaurant.store');
        $data['method'] = 'post';
        return view('Restaurant.form_Restaurant', $data); 
    }

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

        Restaurant::create($request->only([
            'restaurant_id',
            'name',
            'country',
            'city',
            'street',
            'building',
            'phone_number',
            'category',
            'open_time',
            'close_time',
            'seating_capacity',
        ]));

        return redirect('datarestaurant');
    }

    public function edit(int $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $data['Restaurant'] = $restaurant;
        $data['route'] = route('datarestaurant.update', $id);
        $data['method'] = 'put';
        return view('Restaurant.form_Restaurant', $data);
    }

    public function update(Request $request, int $id)
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

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($request->only([
            'restaurant_id',
            'name',
            'country',
            'city',
            'street',
            'building',
            'phone_number',
            'category',
            'open_time',
            'close_time',
            'seating_capacity',
        ]));

        return redirect('datarestaurant')->with('success', 'Restaurant updated successfully!');
    }

        public function destroy(int $id)
        {
            $restaurant = Restaurant::findOrFail($id);
            $restaurant->delete();

            return redirect('datarestaurant')->with('success', 'Restaurant deleted successfully!');
        }

    
}
