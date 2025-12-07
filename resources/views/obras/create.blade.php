

@section('content')

<div class="container mx-auto p-6 max-w-3xl">

    <h1 class="text-2xl font-bold mb-6" style="color:#333D29;">
        Adicionar Obra
    </h1>

    <!-- Mensagens de erro de validação -->
    @if($errors->any())
        <div class="px-4 py-3 mb-6 border rounded" style="background:#A4AC86; border-color:#7F4F24; color:#333D29;">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('obras.store') }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="p-6 rounded-lg shadow-sm space-y-4" 
          style="background:#F8F8F5; border:1px solid #A4AC86;">
        
        @csrf

        <!-- Título -->
        <div>
            <label class="block font-medium mb-1" style="color:#333D29;">Título</label>
            <input type="text" 
                   name="titulo" 
                   value="{{ old('titulo') }}"
                   class="w-full px-3 py-2 rounded-md border focus:ring focus:outline-none" 
                   style="border-color:#A4AC86; focus-ring-color:#A4AC86;">
        </div>

        <!-- Artista -->
        <div>
            <label class="block font-medium mb-1" style="color:#333D29;">Artista</label>
            <select name="artist_id" 
                    class="w-full px-3 py-2 rounded-md border focus:ring focus:outline-none" 
                    style="border-color:#A4AC86;">
                <option value="">Selecione um artista</option>

                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}" 
                        {{ old('artist_id') == $artist->id ? 'selected' : '' }}>
                        {{ $artist->nome }}
                    </option>
                @endforeach

            </select>
        </div>

        <!-- Ano -->
        <div>
            <label class="block font-medium mb-1" style="color:#333D29;">Ano</label>
            <input type="number" 
                   name="ano" 
                   value="{{ old('ano') }}"
                   class="w-full px-3 py-2 rounded-md border focus:ring focus:outline-none" 
                   style="border-color:#A4AC86;">
        </div>

        <!-- Técnica -->
        <div>
            <label class="block font-medium mb-1" style="color:#333D29;">Técnica</label>
            <input type="text" 
                   name="tecnica" 
                   value="{{ old('tecnica') }}"
                   class="w-full px-3 py-2 rounded-md border focus:ring focus:outline-none"
                   style="border-color:#A4AC86;">
        </div>

        <!-- Imagem -->
        <div>
            <label class="block font-medium mb-1" style="color:#333D29;">Imagem (opcional)</label>

            <div class="flex flex-col items-center">

                <label class="cursor-pointer px-4 py-2 rounded-md mb-2 text-white"
                       style="background:#7F4F24;">
                    Selecionar Arquivo
                    <input type="file" name="imagem" accept="image/*" class="hidden" onchange="previewImage(event)">
                </label>

                <img id="imagePreview"
                     src="#"
                     alt="Preview"
                     class="hidden w-48 h-48 object-cover rounded-md border"
                     style="border-color:#A4AC86;">
            </div>
        </div>

        <!-- Botões -->
        <div class="flex justify-between items-center mt-4">

            <a href="{{ route('obras.index') }}" 
               style="color:#582F0E;" 
               class="hover:underline">
               Voltar
            </a>

            <button type="submit" 
                    class="px-4 py-2 rounded-md text-white"
                    style="background:#333D29;">
                Salvar
            </button>

        </div>
    </form>

</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    if(input.files && input.files[0]){
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection
@extends('layouts.app')