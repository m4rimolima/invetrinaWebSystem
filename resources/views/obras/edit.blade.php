@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4 text-[#333D29]">Editar Obra</h1>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="px-4 py-3 rounded-md mb-4 bg-[#A4AC86]/30 border border-[#656D4A] text-[#333D29]">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mensagens de erro --}}
    @if($errors->any())
        <div class="px-4 py-3 rounded-md mb-4 bg-[#7F4F24]/20 border border-[#7F4F24] text-[#7F4F24]">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulário --}}
    <form action="{{ route('obras.update', $obra->id) }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded-md shadow-md border border-[#A4AC86]">
        @csrf
        @method('PUT')

        {{-- Título --}}
        <div class="mb-4">
            <label for="titulo" class="block text-[#333D29] font-medium mb-2">Título</label>
            <input type="text" name="titulo" id="titulo"
                   value="{{ old('titulo', $obra->titulo) }}"
                   class="w-full border border-[#656D4A]/40 rounded-md px-3 py-2 focus:border-[#7F4F24] focus:ring-[#7F4F24]">
        </div>

        {{-- Artista --}}
        <div class="mb-4">
            <label for="artist_id" class="block text-[#333D29] font-medium mb-2">Artista</label>
            <select name="artist_id" id="artist_id"
                    class="w-full border border-[#656D4A]/40 rounded-md px-3 py-2 focus:border-[#7F4F24] focus:ring-[#7F4F24]">
                <option value="">Selecione um artista</option>
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}" {{ old('artist_id', $obra->artist_id) == $artist->id ? 'selected' : '' }}>
                        {{ $artist->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Ano --}}
        <div class="mb-4">
            <label for="ano" class="block text-[#333D29] font-medium mb-2">Ano</label>
            <input type="number" name="ano" id="ano"
                   value="{{ old('ano', $obra->ano) }}"
                   class="w-full border border-[#656D4A]/40 rounded-md px-3 py-2 focus:border-[#7F4F24] focus:ring-[#7F4F24]">
        </div>

        {{-- Técnica --}}
        <div class="mb-4">
            <label for="tecnica" class="block text-[#333D29] font-medium mb-2">Técnica</label>
            <input type="text" name="tecnica" id="tecnica"
                   value="{{ old('tecnica', $obra->tecnica) }}"
                   class="w-full border border-[#656D4A]/40 rounded-md px-3 py-2 focus:border-[#7F4F24] focus:ring-[#7F4F24]">
        </div>

        {{-- Imagem --}}
        <div class="mb-4 flex flex-col items-center">
            <label class="block text-[#333D29] font-medium mb-2">Imagem</label>

            <img id="currentImage"
                 src="{{ $obra->imagem ? asset('storage/' . $obra->imagem) : '' }}"
                 class="w-24 h-24 object-cover rounded-md border border-[#A4AC86] mb-2">

            <label class="bg-[#7F4F24] text-white px-4 py-2 rounded-md cursor-pointer hover:bg-[#582F0E] transition">
                Selecionar arquivo
                <input type="file" name="imagem" class="hidden" accept="image/*" onchange="previewImage(event)">
            </label>

            <img id="preview" class="w-24 h-24 object-cover mt-2 hidden rounded-md border border-[#A4AC86]">
        </div>

        {{-- Botões --}}
        <div class="flex justify-between items-center mt-6">

            <a href="{{ route('obras.index') }}" class="text-[#656D4A] hover:text-[#333D29] transition">
                Voltar
            </a>

            <button type="submit"
                    class="bg-[#7F4F24] text-white px-4 py-2 rounded-md hover:bg-[#582F0E] transition">
                Atualizar
            </button>

        </div>

    </form>
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
