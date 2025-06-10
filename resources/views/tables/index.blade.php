@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>All Tables</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Add New Table Button --}}
    <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">Add New Table</a>

    {{-- Tables Display --}}
    @if($tables->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                   
                    <th>Table Number</th>
                    <th>Status</th>
                    <th>Size</th>
                    <th>Restaurant ID</th>
                    <th>Admin ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tables as $table)
                    <tr>
                       
                        <td>{{ $table->Table_naumber }}</td>
                        <td>{{ $table->status }}</td>
                        <td>{{ $table->Size }}</td>
                        <td>{{ $table->restaurant_id ?? 'N/A' }}</td>
                        <td>{{ $table->admin_id ?? 'N/A' }}</td>
                        <td>
                            {{-- Edit Button --}}
                            <a href="{{ route('tables.edit', ['table' => $table->Table_naumber]) }}" class="btn btn-sm btn-warning">Edit</a>

                            {{-- Delete Button --}}
                            <form action="{{ route('tables.destroy', ['table' => $table->Table_naumber]) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure you want to delete this table?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tables found.</p>
    @endif
</div>
@endsection