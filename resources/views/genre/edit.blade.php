@extends('adminlte::page')

@section('title', 'Edit Genre')

@section('content_header')
    <h1>Edit Genre</h1>
@endsection

@section('content')
    <form action="{{ route('genre.update', $genre) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $genre->nama }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
