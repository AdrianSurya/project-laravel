@extends('adminlte::page')

@section('title', 'Tambah Peran')

@section('content_header')
    <h1>Tambah Peran</h1>
@endsection

@section('content')
<form action="{{ route('peran.store') }}" method="POST">
    @csrf
    <div class="mb-3">
    <label>Film</label>
    <select name="film_id" class="form-control" required>
        @foreach($films as $film)
            <option value="{{ $film->id }}">{{ $film->judul }}</option>
        @endforeach
    </select>
    </div>

    <div class="mb-3">    
    <label>Cast</label>
    <select name="cast_id" class="form-control" required>
        @foreach($casts as $cast)
            <option value="{{ $cast->id }}">{{ $cast->nama }}</option>
        @endforeach
    </select>
    </div>

    <div class="mb-3">
    <label>Nama Peran</label>
    <input type="text" name="nama" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
