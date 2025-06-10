@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Age Range Report</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Age Range</th>
                <th>Total Users</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->age_range }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
