@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daily Reservations Report</h2>
    <table class="table table-striped table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Total Reservations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
            @endforeach
            @if($data->isEmpty())
                <tr><td colspan="2">No data available</td></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
