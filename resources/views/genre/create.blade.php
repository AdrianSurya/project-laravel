@extends('adminlte::page')

@section('title', 'Tambah Genre')

@section('content_header')
    <h1>Tambah Genre</h1>
@endsection

@section('content')
    <form action="{{ route('genre.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
