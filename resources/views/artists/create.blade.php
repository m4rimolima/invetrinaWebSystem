@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white">
    <h1 class="text-2xl font-bold mb-4 text-[#333D29]">Adicionar Artista</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('artists.store') }}" method="POST" class="bg-white p-6 border border-[#A4AC86] rounded-md shadow-md">
        @csrf

        <div class="mb-4">
            <label for="nome" class="block text-[#656D4A] font-medium mb-2">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
        </div>

        <div class="mb-4">
            <label for="nacionalidade" class="block text-[#656D4A] font-medium mb-2">Nacionalidade</label>
            <input type="text" name="nacionalidade" id="nacionalidade" value="{{ old('nacionalidade') }}" class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
        </div>

        <div class="mb-4">
            <label for="data_nascimento" class="block text-[#656D4A] font-medium mb-2">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}" class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
        </div>

        <div class="mb-4">
            <label for="biografia" class="block text-[#656D4A] font-medium mb-2">Biografia</label>
            <textarea name="biografia" id="biografia" rows="5" class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">{{ old('biografia') }}</textarea>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('artists.index') }}" class="text-[#7F4F24] hover:text-[#582F0E]">Voltar</a>
            <button type="submit" class="bg-[#7F4F24] text-white px-4 py-2 rounded-md shadow hover:bg-[#582F0E] transition">Salvar</button>
        </div>
    </form>
</div>
@endsection