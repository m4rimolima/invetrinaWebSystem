@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Adicionar Logística</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('logisticas.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label for="obra_id" class="block text-gray-700 font-medium mb-2">Obra</label>
            <select name="obra_id" id="obra_id" class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="">Selecione uma obra</option>
                @foreach($obras as $obra)
                    <option value="{{ $obra->id }}" {{ old('obra_id') == $obra->id ? 'selected' : '' }}>
                        {{ $obra->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="responsavel" class="block text-gray-700 font-medium mb-2">Responsável</label>
            <input type="text" name="responsavel" id="responsavel" value="{{ old('responsavel') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="local_origem" class="block text-gray-700 font-medium mb-2">Local de Origem</label>
            <input type="text" name="local_origem" id="local_origem" value="{{ old('local_origem') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="local_destino" class="block text-gray-700 font-medium mb-2">Local de Destino</label>
            <input type="text" name="local_destino" id="local_destino" value="{{ old('local_destino') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="data_transporte" class="block text-gray-700 font-medium mb-2">Data do Transporte</label>
            <input type="date" name="data_transporte" id="data_transporte" value="{{ old('data_transporte') }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>


        <div class="flex justify-between items-center">
            <a href="{{ route('logisticas.index') }}" class="text-gray-600 hover:text-gray-900">Voltar</a>
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Salvar</button>
        </div>
    </form>
</div>
@endsection
