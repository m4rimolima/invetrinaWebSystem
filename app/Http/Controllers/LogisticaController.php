<?php
namespace App\Http\Controllers;

use App\Models\Logistica;
use App\Models\Obra;
use App\Http\Requests\LogisticaRequest;

class LogisticaController extends Controller
{
    public function index()
    {
        $logs = Logistica::with('obra.artist','exposicao')->latest()->paginate(10);
        return view('logisticas.index', compact('logs'));
    }

    public function create()
    {
        $obras = Obra::with('artist')->orderBy('titulo')->get();
        $exposicoes = \App\Models\Exposicao::orderBy('nome')->get();
        return view('logisticas.create', compact('obras','exposicoes'));
    }

    public function store(LogisticaRequest $request)
    {
        Logistica::create($request->validated());
        return redirect()->route('logisticas.index')->with('success','Logística criada.');
    }

    public function show(Logistica $logistica)
    {
        $logistica->load('obra.artist','exposicao');
        return view('logisticas.show', compact('logistica'));
    }

    public function edit(Logistica $logistica)
    {
        $obras = Obra::with('artist')->orderBy('titulo')->get();
        $exposicoes = \App\Models\Exposicao::orderBy('nome')->get();
        return view('logisticas.edit', compact('logistica','obras','exposicoes'));
    }

    public function update(LogisticaRequest $request, Logistica $logistica)
    {
        $logistica->update($request->validated());
        return redirect()->route('logisticas.index')->with('success','Logística atualizada.');
    }

    public function destroy(Logistica $logistica)
    {
        $logistica->delete();
        return redirect()->route('logisticas.index')->with('success','Logística removida.');
    }
}
