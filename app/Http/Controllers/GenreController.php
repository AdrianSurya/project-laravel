<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoregenreRequest;
use App\Http\Requests\UpdategenreRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoregenreRequest $request)
    {
        $request->validate([
            'nama' => 'required|string|max:45',
        ]);

        Genre::create($request->all());

        return redirect()->route('genre.index')->with('success', 'Genre berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdategenreRequest $request, Genre $genre)
    {
        $request->validate([
            'nama' => 'required|string|max:45',
        ]);

        $genre->update($request->all());

        return redirect()->route('genre.index')->with('success', 'Genre berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus.');
    }
}
