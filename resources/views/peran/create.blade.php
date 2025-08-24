@extends('adminlte::page')

@section('title', 'Tambah Peran')

@section('content_header')
    <h1>Tambah Peran</h1>
@endsection

@section('content')
    <form action="{{ route('peran.create') }}" method="POST" enctype="multipart/form-data" value="{{ $film->id }}">
        @csrf
        <div class="mb-3">
            <label>Nama Cast</label>
            <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Peran</label>
                <input type="text" name="peran" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    @endsection
