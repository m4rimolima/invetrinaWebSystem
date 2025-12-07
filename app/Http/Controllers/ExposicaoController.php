<?php

namespace App\Http\Controllers;

use App\Models\Exposicao;
use App\Models\Obra;
use Illuminate\Http\Request;

class ExposicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exposicoes = Exposicao::with('obra')->paginate(10);
        return view('exposicoes.index', compact('exposicoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obras = Obra::all();
        return view('exposicoes.create', compact('obras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'nome' => 'required|string|max:255',
            'local' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        Exposicao::create($validated);

        return redirect()->route('exposicoes.index')
            ->with('success', 'Exposição criada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exposicao $exposicao)
    {
        $obras = Obra::all();
        return view('exposicoes.edit', compact('exposicao', 'obras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exposicao $exposicao)
    {
        $validated = $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'nome' => 'required|string|max:255',
            'local' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        $exposicao->update($validated);

        return redirect()->route('exposicoes.index')
            ->with('success', 'Exposição atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exposicao $exposicao)
    {
        $exposicao->delete();

        return redirect()->route('exposicoes.index')
            ->with('success', 'Exposição removida com sucesso!');
    }
}
