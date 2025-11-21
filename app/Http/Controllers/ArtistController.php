<?php
namespace App\Http\Controllers;

use App\Models\Artist;
use App\Http\Requests\ArtistRequest;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::latest()->paginate(10);
        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(ArtistRequest $request)
    {
        Artist::create($request->validated());
        return redirect()->route('artists.index')->with('success','Artista criado com sucesso.');
    }

    public function show(Artist $artist)
    {
        $artist->load('obras');
        return view('artists.show', compact('artist'));
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    public function update(ArtistRequest $request, Artist $artist)
    {
        $artist->update($request->validated());
        return redirect()->route('artists.index')->with('success','Artista atualizado.');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('artists.index')->with('success','Artista removido.');
    }
}
