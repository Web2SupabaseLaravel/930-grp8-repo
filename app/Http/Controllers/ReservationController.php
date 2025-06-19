<?php
namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ReservationController;

class ReservationController extends Controller
{
    public function index()
    {
        $reservation = Reservation::all(); 
        return $reservation;
    }

  public function create()
{
    $data['reservation'] = new \App\Models\Reservation(); 
    $data['route'] = route('datareservation.store'); 
    $data['method'] = 'post';

    return response()->json(['message' => 'Create form not available in API'], 404);
}
   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'table_number' => 'required|integer',
        'status' => 'required|string',
        'reservation_time' => 'required|date',
        'resto_rating' => 'required|numeric',
        'number_of_people' => 'required|integer',
    ]);

    $reservation = Reservation::create($validated);

    return response()->json([
        'message' => 'Reservation created successfully!',
        'data' => $reservation
    ], 201);
}

    public function show(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    public function edit(string $id)
    {
        // To be implemented
    }

    public function update(Request $request, string $reservationid)
    {

        $reservation = Reservation::findOrFail($reservationid);
        $reservation->update($request->all());
    return response()->json(['message' => 'Reservation updated successfully', 'data' => $reservation], 200);

    }   
 

    public function destroy($reservationid)
    {
        $SUPABASE_URL = env('SUPABASE_URL');
        $SUPABASE_API_KEY = env('SUPABASE_API_KEY');

        $url = "$SUPABASE_URL/rest/v1/reservation?reservationid=eq.$reservationid";

        $response = Http::withHeaders([
            'apikey' => $SUPABASE_API_KEY,
            'Authorization' => 'Bearer ' . $SUPABASE_API_KEY,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->delete($url);

        if ($response->successful()) {
            return response()->json(['message' => 'Deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Delete failed'], 500);
        }
    }
}