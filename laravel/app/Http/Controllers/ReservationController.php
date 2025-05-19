<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
  $reservation = Reservation::all(); 
            return $reservation;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['reservation'] = new \App\Models\Reservation(); 
    $data['route'] = 'datareservation.store'; 
    $data['method'] = 'post';
    #$data['titleForm'] = 'Form Input Reservations'; 
    #$data['submitButton'] = Submit;
    #return view('reservations/form_reservations', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
        'name' => 'required',
        'table_number' => 'required', 
        'status' => 'required', 
        'reservation_time' => 'required', 
        'resto_rating' => 'required', 
        'number_of_people' => 'required', 


    ]);

    $inputEvent = new \App\Models\Reservation(); 
    $inputEvent->name = $request->name;
    $inputEvent->table_number = $request->table_number;  
    $inputEvent->status = $request->status; 
    $inputEvent->reservation_time = $request->reservation_time; 
    $inputEvent->resto_rating = $request->resto_rating; 
    $inputEvent->number_of_people = $request->number_of_people; 

    $inputEvent->save();
    return redirect('datareservation/create'); 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
{
    $reservation = \App\Models\Reservation::findOrFail($id);

    return view('reservations.show', compact('reservation'));
}

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
 


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id, $reservation_time)
    {


    $SUPABASE_URL = env('https://kxoqqnliftwtwovdfvtd.supabase.co');
    $SUPABASE_API_KEY = env('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imt4b3FxbmxpZnR3dHdvdmRmdnRkIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU4NzEyMjcsImV4cCI6MjA2MTQ0NzIyN30.Pb8r8G-C9YW2avTRbVkbq_3VW0aDHc3xPbbCl_nskZ8');

    $url = $SUPABASE_URL . "/rest/v1/reservation?user_id=eq.$user_id&reservation_time=eq.$reservation_time";

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

