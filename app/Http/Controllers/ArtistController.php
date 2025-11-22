<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::paginate(10); // 10 itens por página
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'            => 'required|string|max:255',
            'nacionalidade'   => 'required|string|max:255',
            'data_nascimento' => 'nullable|date',
            'biografia'       => 'nullable|string',
        ]);

        Artist::create([
            'nome'            => $request->nome,
            'nacionalidade'   => $request->nacionalidade,
            'biografia'       => $request->biografia,
        ]);

        return redirect()->route('artists.index')
            ->with('success', 'Artista criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'nome'            => 'required|string|max:255',
            'nacionalidade'   => 'required|string|max:255',
            'data_nascimento' => 'nullable|date',
            'biografia'       => 'nullable|string',
        ]);

        $artist->update([
            'nome'            => $request->nome,
            'nacionalidade'   => $request->nacionalidade,
            'biografia'       => $request->biografia,
        ]);

        return redirect()->route('artists.index')
            ->with('success', 'Artista atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();

        return redirect()->route('artists.index')
            ->with('success', 'Artista removido com sucesso!');
    }
}
