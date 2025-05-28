<?php

namespace App\Http\Controllers;

use App\Models\film;
use App\Models\Genre;
use App\Http\Requests\StorefilmRequest;
use App\Http\Requests\UpdatefilmRequest;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::with('genre')->get();
        return view('film.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('film.create', compact('genres'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorefilmRequest $request)
    {
        $request->validate([
            'judul' => 'required|string|max:45',
            'ringkasan' => 'nullable|string',
            'tahun' => 'required|integer',
            'poster' => 'nullable|string|max:45',
            'genre_id' => 'required|exists:genres,id'
        ]);

        Film::create($request->all());
        return redirect()->route('film.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(film $film)
    {
        $genres = Genre::all();
        return view('film.edit', compact('film', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefilmRequest $request, film $film)
    {
        $request->validate([
            'judul' => 'required|string|max:45',
            'ringkasan' => 'nullable|string',
            'tahun' => 'required|integer',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'genre_id' => 'required|exists:genres,id'
        ]);

        $film->update($request->all());
        return redirect()->route('film.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(film $film)
    {
        $film->delete();
        return redirect()->route('film.index');
    }
}
