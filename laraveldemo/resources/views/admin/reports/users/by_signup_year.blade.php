@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Signup Year Report</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Signup Year</th>
                <th>Total Users</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->year }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
