@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Exposição</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('exposicoes.update', $exposicao->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="obra_id" class="block text-gray-700 font-medium mb-2">Obra</label>
            <select name="obra_id" id="obra_id" class="w-full border border-gray-300 rounded px-3 py-2">
                @foreach($obras as $obra)
                    <option value="{{ $obra->id }}" {{ old('obra_id', $exposicao->obra_id) == $obra->id ? 'selected' : '' }}>
                        {{ $obra->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 font-medium mb-2">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $exposicao->nome) }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="local" class="block text-gray-700 font-medium mb-2">Local</label>
            <input type="text" name="local" id="local" value="{{ old('local', $exposicao->local) }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="data_inicio" class="block text-gray-700 font-medium mb-2">Data Início</label>
            <input type="date" name="data_inicio" id="data_inicio" value="{{ old('data_inicio', $exposicao->data_inicio) }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="data_fim" class="block text-gray-700 font-medium mb-2">Data Fim</label>
            <input type="date" name="data_fim" id="data_fim" value="{{ old('data_fim', $exposicao->data_fim) }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('exposicoes.index') }}" class="text-gray-600 hover:text-gray-900">Voltar</a>
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Atualizar</button>
        </div>
    </form>
</div>
@endsection
