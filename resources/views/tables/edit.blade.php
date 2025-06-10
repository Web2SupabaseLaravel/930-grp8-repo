@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Table</h2>
    @include('tables.form', ['table' => $table])
</div>
@endsection