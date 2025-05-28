@extends('adminlte::page')

@section('title', 'Daftar Genre')

@section('content_header')
    <h1>Daftar Genre</h1>
@endsection

@section('content')
    <a href="{{ route('genre.create') }}" class="btn btn-primary mb-3">Tambah Genre</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->nama }}</td>
                    <td>
                        <a href="{{ route('genre.edit', $genre) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('genre.destroy', $genre) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
