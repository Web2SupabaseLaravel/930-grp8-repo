<!-- resources/views/datauser/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>قائمة المستخدمين</h1>
<table>
  <thead>
    <tr><th>ID</th><th>الاسم</th><th>بريد إلكتروني</th></tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{ $user->user_id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
