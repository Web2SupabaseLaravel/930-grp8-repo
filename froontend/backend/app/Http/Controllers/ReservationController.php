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
    $reservation = \App\Models\Reservation::findOrFail($reservationid);

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
   public function update(Request $request, $reservationid)
{
    $reservation = Reservation::where('reservationid', $reservationid)->first();

    if (!$reservation) {
        return response()->json(['error' => 'Reservation not found'], 404);
    }
    $validated = $request->validate([
        'name' => 'sometimes|required',
        'table_number' => 'sometimes|required',
        'status' => 'sometimes|required',
        'reservation_time' => 'sometimes|required',
        'resto_rating' => 'sometimes|required',
        'number_of_people' => 'sometimes|required',
    ]);

    $reservation->update($validated);
    return response()->json([
        'message' => 'Reservation updated successfully',
        'reservation' => $reservation,
    ]);

    /**
     * Remove the specified resource from storage.
     */
  
}
    }

