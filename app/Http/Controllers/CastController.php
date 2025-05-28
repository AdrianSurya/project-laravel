<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        $cast = Cast::all();
        return view('cast.index', compact('cast'));
    }

    public function create()
    {
        return view('cast.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'umur' => 'required|integer',
            'bio' => 'nullable',
        ]);

        Cast::create($request->all());

        return redirect()->route('cast.index')->with('success', 'Berhasil menambah data.');
    }

    public function edit(Cast $cast)
    {
        return view('cast.edit', compact('cast'));
    }

    public function update(Request $request, Cast $cast)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'umur' => 'required|integer',
            'bio' => 'nullable',
        ]);

        $cast->update($request->all());

        return redirect()->route('cast.index')->with('success', 'Berhasil update data.');
    }

    public function destroy(Cast $cast)
    {
        $cast->delete();
        return redirect()->route('cast.index')->with('success', 'Berhasil hapus data.');
    }
}
