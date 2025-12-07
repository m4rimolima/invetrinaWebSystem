<?php

namespace App\Http\Controllers;

use App\Models\Logistica;
use App\Models\Obra;
use Illuminate\Http\Request;

class LogisticaController extends Controller
{
    public function index()
    {
        $logisticas = Logistica::with('obra')->paginate(10);
        return view('logisticas.index', compact('logisticas'));
    }

    public function create()
    {

        $obras = Obra::all();

        return view('logisticas.create', compact('obras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'responsavel' => 'required|string|max:255',
            'local_origem' => 'required|string|max:255',
            'local_destino' => 'required|string|max:255',
            'data_transporte' => 'required|date',
        ]);

        Logistica::create($request->all());

        return redirect()->route('logisticas.index')->with('success', 'Logística adicionada com sucesso!');
    }

    public function edit(Logistica $logistica)
    {
        $obras = Obra::all();
        return view('logisticas.edit', compact('logistica', 'obras'));
    }

    public function update(Request $request, Logistica $logistica)
    {
        $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'responsavel' => 'required|string|max:255',
            'local_origem' => 'required|string|max:255',
            'local_destino' => 'required|string|max:255',
            'data_transporte' => 'required|date',
        ]);

        $logistica->update($request->all());

        return redirect()->route('logisticas.index')->with('success', 'Logística atualizada com sucesso!');
    }

    public function destroy(Logistica $logistica)
    {
        $logistica->delete();

        return redirect()->route('logisticas.index')->with('success', 'Logística removida com sucesso!');
    }
}
