@extends('adminlte::page')

@section('title', 'Edit Film')

@section('content_header')
    <h1>Edit Film</h1>
@endsection

@section('content')
    <form action="{{ route('film.update', $film->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $film->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Ringkasan</label>
            <textarea name="ringkasan" class="form-control">{{ $film->ringkasan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ $film->tahun }}" required>
        </div>

        <div class="mb-3">
            <label>Genre</label>
            <select name="genre_id" class="form-control" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $film->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Poster</label>
            <input type="file" name="poster" class="form-control">
            @if ($film->poster)
                <p class="mt-2">Poster saat ini:</p>
                <img src="{{ asset('storage/posters/' . $film->poster) }}" width="120" alt="Poster">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
