@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4 text-[#333D29]">Editar Logística</h1>

    {{-- ERROS --}}
    @if($errors->any())
        <div class="bg-[#F5F5F0] border border-[#7F4F24] text-[#582F0E] px-4 py-3 rounded-md mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <form action="{{ route('logisticas.update', $logistica->id) }}" method="POST"
          class="bg-white p-6 border border-[#A4AC86] rounded-md shadow-sm">
        @csrf
        @method('PUT')

        {{-- OBRA --}}
        <div class="mb-4">
            <label for="obra_id" class="block text-[#333D29] font-medium mb-2">Obra</label>
            <select name="obra_id" id="obra_id"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:border-[#7F4F24]">
                <option value="">Selecione uma obra</option>
                @foreach($obras as $obra)
                    <option value="{{ $obra->id }}"
                        {{ old('obra_id', $logistica->obra_id) == $obra->id ? 'selected' : '' }}>
                        {{ $obra->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- RESPONSÁVEL --}}
        <div class="mb-4">
            <label for="responsavel" class="block text-[#333D29] font-medium mb-2">Responsável</label>
            <input type="text" name="responsavel" id="responsavel"
                value="{{ old('responsavel', $logistica->responsavel) }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:border-[#7F4F24]">
        </div>

        {{-- ORIGEM --}}
        <div class="mb-4">
            <label for="local_origem" class="block text-[#333D29] font-medium mb-2">Local de Origem</label>
            <input type="text" name="local_origem" id="local_origem"
                value="{{ old('local_origem', $logistica->local_origem) }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:border-[#7F4F24]">
        </div>

        {{-- DESTINO --}}
        <div class="mb-4">
            <label for="local_destino" class="block text-[#333D29] font-medium mb-2">Local de Destino</label>
            <input type="text" name="local_destino" id="local_destino"
                value="{{ old('local_destino', $logistica->local_destino) }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:border-[#7F4F24]">
        </div>

        {{-- DATA --}}
        <div class="mb-4">
            <label for="data_transporte" class="block text-[#333D29] font-medium mb-2">Data do Transporte</label>
            <input type="date" name="data_transporte" id="data_transporte"
                value="{{ old('data_transporte', \Carbon\Carbon::parse($logistica->data_transporte)->format('Y-m-d')) }}"
                class="w-full border border-[#A4AC86] rounded-md px-3 py-2 focus:outline-none focus:border-[#7F4F24]">
        </div>

        {{-- AÇÕES --}}
        <div class="flex justify-between items-center mt-6">

            <a href="{{ route('logisticas.index') }}"
               class="text-[#656D4A] hover:text-[#333D29] transition">
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
