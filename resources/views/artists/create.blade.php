@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Adicionar Artista</h1>

    <!-- Mensagens de erro de validação -->
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('artists.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 font-medium mb-2">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="nacionalidade" class="block text-gray-700 font-medium mb-2">Nacionalidade</label>
            <input type="text" name="nacionalidade" id="nacionalidade" value="{{ old('nacionalidade') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="data_nascimento" class="block text-gray-700 font-medium mb-2">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="biografia" class="block text-gray-700 font-medium mb-2">Biografia</label>
            <textarea name="biografia" id="biografia" rows="5" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('biografia') }}</textarea>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('artists.index') }}" class="text-gray-600 hover:text-gray-900">Voltar</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Salvar</button>
        </div>
    </form>
</div>
@endsection
