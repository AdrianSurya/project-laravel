@extends('template.master')

@section('title', 'Dashboadrd Admin')

@section('content')

<h1>Dashborad Admin</h1>
<form action="{{ route('login.logout') }}" method="POST">
  @csrf
  @method('POST')
  <input type="submit" value="Logout">
</form>
  
@endsection