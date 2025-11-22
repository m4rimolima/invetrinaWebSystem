@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Artista</h1>

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

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

    <form action="{{ route('artists.update', $artist->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 font-medium mb-2">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $artist->nome) }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="nacionalidade" class="block text-gray-700 font-medium mb-2">Nacionalidade</label>
            <input type="text" name="nacionalidade" id="nacionalidade" value="{{ old('nacionalidade', $artist->nacionalidade) }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="biografia" class="block text-gray-700 font-medium mb-2">Biografia</label>
            <textarea name="biografia" id="biografia" rows="5" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('biografia', $artist->biografia) }}</textarea>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('artists.index') }}" class="text-gray-600 hover:text-gray-900">Voltar</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Atualizar</button>
        </div>
    </form>
</div>
@endsection
