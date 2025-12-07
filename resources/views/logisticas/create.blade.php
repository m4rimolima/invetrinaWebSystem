@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4 text-[#333D29]">Adicionar Logística</h1>

    {{-- ALERTA DE ERROS --}}
    @if($errors->any())
        <div class="bg-[#A4AC86] border border-[#656D4A] text-[#333D29] px-4 py-3 rounded-md mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <form action="{{ route('logisticas.store') }}" method="POST" 
          class="bg-white p-6 rounded-md shadow-md">

        @csrf

        {{-- Obra --}}
        <div class="mb-4">
            <label for="obra_id" class="block text-[#333D29] font-medium mb-2">Obra</label>
            <select name="obra_id" id="obra_id"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
                <option value="">Selecione uma obra</option>
                @foreach($obras as $obra)
                    <option value="{{ $obra->id }}" 
                        {{ old('obra_id') == $obra->id ? 'selected' : '' }}>
                        {{ $obra->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Responsável --}}
        <div class="mb-4">
            <label for="responsavel" class="block text-[#333D29] font-medium mb-2">Responsável</label>
            <input type="text" name="responsavel" id="responsavel"
                value="{{ old('responsavel') }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
        </div>

        {{-- Local de Origem --}}
        <div class="mb-4">
            <label for="local_origem" class="block text-[#333D29] font-medium mb-2">Local de Origem</label>
            <input type="text" name="local_origem" id="local_origem"
                value="{{ old('local_origem') }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
        </div>

        {{-- Local de Destino --}}
        <div class="mb-4">
            <label for="local_destino" class="block text-[#333D29] font-medium mb-2">Local de Destino</label>
            <input type="text" name="local_destino" id="local_destino"
                value="{{ old('local_destino') }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]">
        </div>

        {{-- Data do Transporte --}}
        <div class="mb-4">
            <label for="data_transporte" class="block text-[#333D29] font-medium mb-2">Data do Transporte</label>
            <input type="date" name="data_transporte" id="data_transporte"
                value="{{ old('data_transporte') }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7F4F24]" 
                required>
        </div>

        {{-- Botões --}}
        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('logisticas.index') }}" 
               class="text-[#333D29] hover:text-[#582F0E] transition font-medium">
               Voltar
            </a>

            <button type="submit"
                class="bg-[#7F4F24] text-white px-4 py-2 rounded-md hover:bg-[#582F0E] transition">
                Salvar
            </button>
        </div>

    </form>
</div>
@endsection
