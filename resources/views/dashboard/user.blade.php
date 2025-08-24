@extends('template.master')

@section('title', 'Dashboadrd User')

@section('content')

<h1>Dashborad User</h1>
<form action="{{ route('login.logout') }}" method="POST">
  @csrf
  @method('POST')
  <input type="submit" value="Logout">
</form>
  
@endsection