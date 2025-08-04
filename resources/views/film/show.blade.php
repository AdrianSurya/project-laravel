@extends('adminlte::page')

@section('title', 'Detail Film')

@section('content_header')
    <h1>Detail Film</h1>
@endsection

@section('content')
    <a href="{{ route('film.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <h3>{{ $film->judul }}</h3>
            <p><strong>Ringkasan:</strong> {{ $film->ringkasan }}</p>
            <p><strong>Tahun:</strong> {{ $film->tahun }}</p>
            <p><strong>Genre:</strong> {{ $film->genre->nama }}</p>
            @if ($film->poster)
                <p><strong>Poster:</strong></p>
                <img src="{{ asset('storage/' . $film->poster) }}" class="img-fluid" style="max-width: 300px;" alt="Poster">
            @else
                <p class="text-muted">Tidak ada poster</p>
            @endif
            <h4>Daftar Peran</h4>
            @if ($film->perans->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Cast</th>
                            <th>Nama Peran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($film->perans as $peran)
                            <tr>
                                <td>{{ $peran->cast->nama }}</td>
                                <td>{{ $peran->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">Belum ada peran ditambahkan.</p>
            @endif
        </div>
    </div>
@endsection
