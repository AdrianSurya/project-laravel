<?php

namespace App\Http\Controllers;

use App\Models\peran;
use App\Models\Film;
use App\Models\Cast;
use App\Http\Requests\StoreperanRequest;
use App\Http\Requests\UpdateperanRequest;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perans = Peran::with(['film', 'cast'])->get();
        return view('peran.index', compact('perans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(film $film)
    {
        $films = Film::all();
        $casts = Cast::all();
        return view('peran.create', compact('films', 'casts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreperanRequest $request)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'cast_id' => 'required|exists:casts,id',
            'nama' => 'required|string|max:45',
        ]);

        Peran::create($request->all());
        return redirect()->route('film.show', $request->film_id)->with('success', 'Peran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(peran $peran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(peran $peran)
    {
        $films = Film::all();
        $casts = Cast::all();
        return view('peran.edit', compact('peran', 'films', 'casts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateperanRequest $request, peran $peran)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'cast_id' => 'required|exists:casts,id',
            'nama' => 'required|string|max:45'
        ]);

        $peran->update($request->all());
        return redirect()->route('peran.index')->with('success', 'Peran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(peran $peran)
    {
        $peran->delete();
        return redirect()->route('peran.index')->with('success', 'Peran berhasil dihapus.');
    }
}
