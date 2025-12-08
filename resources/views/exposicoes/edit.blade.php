@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4 text-[#333D29]">Editar Exposição</h1>

  
    @if($errors->any())
        <div class="bg-[#A4AC86] border border-[#656D4A] text-[#333D29] px-4 py-3 rounded-md mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('exposicoes.update', $exposicao->id) }}" 
          method="POST" 
          class="bg-white p-6 rounded-md shadow-md">
        
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="obra_id" class="block text-[#333D29] font-medium mb-2">Obra</label>
            <select name="obra_id" id="obra_id"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
                @foreach($obras as $obra)
                    <option value="{{ $obra->id }}" 
                        {{ old('obra_id', $exposicao->obra_id) == $obra->id ? 'selected' : '' }}>
                        {{ $obra->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

    
        <div class="mb-4">
            <label for="nome" class="block text-[#333D29] font-medium mb-2">Nome</label>
            <input type="text" name="nome" id="nome"
                value="{{ old('nome', $exposicao->nome) }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
        </div>


        <div class="mb-4">
            <label for="local" class="block text-[#333D29] font-medium mb-2">Local</label>
            <input type="text" name="local" id="local"
                value="{{ old('local', $exposicao->local) }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
        </div>

        <div class="mb-4">
            <label for="data_inicio" class="block text-[#333D29] font-medium mb-2">Data Início</label>
            <input type="date" name="data_inicio" id="data_inicio"
                value="{{ old('data_inicio', $exposicao->data_inicio) }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
        </div>

      
        <div class="mb-4">
            <label for="data_fim" class="block text-[#333D29] font-medium mb-2">Data Fim</label>
            <input type="date" name="data_fim" id="data_fim"
                value="{{ old('data_fim', $exposicao->data_fim) }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
        </div>

     
        <div class="flex justify-between items-center mt-6">

            <a href="{{ route('exposicoes.index') }}" 
               class="text-[#333D29] hover:text-[#582F0E] transition font-medium">
               Voltar
            </a>

            <button type="submit"
                class="bg-[#7F4F24] text-white px-4 py-2 rounded-md hover:bg-[#582F0E] transition">
                Atualizar
            </button>

        </div>

    </form>
</div>
@endsection
