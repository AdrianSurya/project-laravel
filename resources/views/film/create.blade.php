@extends('adminlte::page')

@section('title', 'Tambah Film')

@section('content_header')
    <h1>Tambah Film</h1>
@endsection

@section('content')
    <form action="{{ route('film.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Ringkasan</label>
            <textarea name="ringkasan" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Poster</label>
            <input type="file" name="poster" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Genre</label>
            <select name="genre_id" class="form-control" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
