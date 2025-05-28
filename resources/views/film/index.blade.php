@extends('adminlte::page')

@section('title', 'Daftar Film')

@section('content_header')
    <h1>Daftar Film</h1>
@endsection

@section('content')
    <a href="{{ route('film.create') }}" class="btn btn-primary mb-3">Tambah Film</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Ringkasan</th>
                <th>Tahun</th>
                <th>Genre</th>
                <th>Poster</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($films as $film)
                <tr>
                    <td>{{ $film->judul }}</td>
                    <td>{{ $film->ringkasan }}</td>
                    <td>{{ $film->tahun }}</td>
                    <td>{{ $film->genre->nama }}</td>
                     <td>
                        @if ($film->poster)
                            <img src="{{ asset('storage/posters/' . $film->poster) }}" width="80" alt="Poster">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('film.edit', $film->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('film.destroy', $film->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
