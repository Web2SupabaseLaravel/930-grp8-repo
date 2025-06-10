@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Average Seating Time (in Minutes) per Table</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Table Number</th>
                <th>Average Seating Time (Minutes)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->table_number }}</td>
                    <td>{{ round($row->avg_minutes, 2) }}</td>
                </tr>
            @endforeach

            @if($data->isEmpty())
                <tr>
                    <td colspan="2" class="text-center">No sufficient data to calculate the average.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
