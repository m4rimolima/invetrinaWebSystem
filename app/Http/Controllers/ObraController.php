<?php
namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\Artist;
use App\Http\Requests\ObraRequest;
use Illuminate\Support\Facades\Storage;

class ObraController extends Controller
{
    public function index()
    {
        $obras = Obra::with('artist')->latest()->paginate(10);
        return view('obras.index', compact('obras'));
    }

    public function create()
    {
        $artists = Artist::orderBy('nome')->get();
        return view('obras.create', compact('artists'));
    }

    public function store(ObraRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('obras', 'public');
        }
        Obra::create($data);
        return redirect()->route('obras.index')->with('success','Obra criada com sucesso.');
    }

    public function show(Obra $obra)
    {
        $obra->load('artist','exposicoes');
        return view('obras.show', compact('obra'));
    }

    public function edit(Obra $obra)
    {
        $artists = Artist::orderBy('nome')->get();
        return view('obras.edit', compact('obra','artists'));
    }

    public function update(ObraRequest $request, Obra $obra)
    {
        $data = $request->validated();
        if ($request->hasFile('imagem')) {
            if ($obra->imagem) Storage::disk('public')->delete($obra->imagem);
            $data['imagem'] = $request->file('imagem')->store('obras', 'public');
        }
        $obra->update($data);
        return redirect()->route('obras.index')->with('success','Obra atualizada com sucesso.');
    }

    public function destroy(Obra $obra)
    {
        if ($obra->imagem) Storage::disk('public')->delete($obra->imagem);
        $obra->delete();
        return redirect()->route('obras.index')->with('success','Obra removida.');
    }
}
