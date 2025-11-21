<?php
namespace App\Http\Controllers;

use App\Models\Exposicao;
use App\Models\Obra;
use App\Http\Requests\ExposicaoRequest;

class ExposicaoController extends Controller
{
    public function index()
    {
        $expos = Exposicao::withCount('obras')->latest()->paginate(10);
        return view('exposicoes.index', compact('expos'));
    }

    public function create()
    {
        $obras = Obra::with('artist')->orderBy('titulo')->get();
        return view('exposicoes.create', compact('obras'));
    }

    public function store(ExposicaoRequest $request)
    {
        $data = $request->validated();
        $exposicao = Exposicao::create($data);
        if (!empty($data['obras'])) {
            $exposicao->obras()->sync($data['obras']);
        }
        return redirect()->route('exposicoes.index')->with('success','Exposição criada.');
    }

    public function show(Exposicao $exposicao)
    {
        $exposicao->load('obras.artist');
        return view('exposicoes.show', compact('exposicao'));
    }

    public function edit(Exposicao $exposicao)
    {
        $obras = Obra::with('artist')->orderBy('titulo')->get();
        $exposicao->load('obras');
        return view('exposicoes.edit', compact('exposicao','obras'));
    }

    public function update(ExposicaoRequest $request, Exposicao $exposicao)
    {
        $data = $request->validated();
        $exposicao->update($data);
        $exposicao->obras()->sync($data['obras'] ?? []);
        return redirect()->route('exposicoes.index')->with('success','Exposição atualizada.');
    }

    public function destroy(Exposicao $exposicao)
    {
        $exposicao->obras()->detach();
        $exposicao->delete();
        return redirect()->route('exposicoes.index')->with('success','Exposição removida.');
    }
}
