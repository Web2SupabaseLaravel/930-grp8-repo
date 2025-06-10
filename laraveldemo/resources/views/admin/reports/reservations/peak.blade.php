@extends('layouts.app')

@section('content')
<div class="container">
    <h2>⏰ Peak Reservation Hours</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hour</th>
                <th>Total Reservations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->hour }}:00</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
