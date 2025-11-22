@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6 max-w-3xl">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Adicionar Obra</h1>

```
<!-- Mensagens de erro de validação -->
@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('obras.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md space-y-4">
    @csrf

    <!-- Título -->
    <div>
        <label for="titulo" class="block text-gray-700 font-medium mb-1">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-gray-200">
    </div>

    <!-- Artista -->
    <div>
        <label for="artist_id" class="block text-gray-700 font-medium mb-1">Artista</label>
        <select name="artist_id" id="artist_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-gray-200">
            <option value="">Selecione um artista</option>
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}" {{ old('artist_id') == $artist->id ? 'selected' : '' }}>
                    {{ $artist->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Ano -->
    <div>
        <label for="ano" class="block text-gray-700 font-medium mb-1">Ano</label>
        <input type="number" name="ano" id="ano" value="{{ old('ano') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-gray-200">
    </div>

    <!-- Técnica -->
    <div>
        <label for="tecnica" class="block text-gray-700 font-medium mb-1">Técnica</label>
        <input type="text" name="tecnica" id="tecnica" value="{{ old('tecnica') }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-gray-200">
    </div>

    <!-- Imagem -->
    <div>
        <label class="block text-gray-700 font-medium mb-2">Imagem (opcional)</label>
        <div class="flex flex-col items-center">
            <label class="cursor-pointer bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 mb-2">
                Selecionar Arquivo
                <input type="file" name="imagem" id="imagem" accept="image/*" class="hidden" onchange="previewImage(event)">
            </label>
            <img id="imagePreview" src="#" alt="Preview" class="hidden w-48 h-48 object-cover rounded border border-gray-300">
        </div>
    </div>

    <!-- Botões -->
    <div class="flex justify-between items-center mt-4">
        <a href="{{ route('obras.index') }}" class="text-gray-600 hover:text-gray-900">Voltar</a>
        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Salvar</button>
    </div>
</form>
```

</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    if(input.files && input.files[0]){
        const reader = new FileReader();
        reader.onload = function(e){
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection
