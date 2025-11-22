@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Obra</h1>

```
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('obras.update', $obra->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="titulo" class="block text-gray-700 font-medium mb-2">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $obra->titulo) }}" class="w-full border border-gray-300 rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label for="artist_id" class="block text-gray-700 font-medium mb-2">Artista</label>
        <select name="artist_id" id="artist_id" class="w-full border border-gray-300 rounded px-3 py-2">
            <option value="">Selecione um artista</option>
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}" {{ old('artist_id', $obra->artist_id) == $artist->id ? 'selected' : '' }}>
                    {{ $artist->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="ano" class="block text-gray-700 font-medium mb-2">Ano</label>
        <input type="number" name="ano" id="ano" value="{{ old('ano', $obra->ano) }}" class="w-full border border-gray-300 rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label for="tecnica" class="block text-gray-700 font-medium mb-2">Técnica</label>
        <input type="text" name="tecnica" id="tecnica" value="{{ old('tecnica', $obra->tecnica) }}" class="w-full border border-gray-300 rounded px-3 py-2">
    </div>

    <div class="mb-4 flex flex-col items-center">
        <label class="block text-gray-700 font-medium mb-2">Imagem</label>
        <img id="currentImage" src="{{ $obra->imagem ? asset('storage/' . $obra->imagem) : '' }}" class="w-24 h-24 object-cover rounded border mb-2">
        <label class="bg-gray-800 text-white px-4 py-2 rounded cursor-pointer hover:bg-gray-700">
            Selecionar arquivo
            <input type="file" name="imagem" class="hidden" accept="image/*" onchange="previewImage(event)">
        </label>
        <img id="preview" class="w-24 h-24 object-cover mt-2 hidden rounded border">
    </div>

    <div class="flex justify-between items-center">
        <a href="{{ route('obras.index') }}" class="text-gray-600 hover:text-gray-900">Voltar</a>
        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">Atualizar</button>
    </div>
</form>
```

</div>

<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const current = document.getElementById('currentImage');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.classList.remove('hidden');
    current.classList.add('hidden');
}
</script>

@endsection
