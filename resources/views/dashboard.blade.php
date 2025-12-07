@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white">
    <h1 class="text-3xl font-bold mb-6 text-[#333D29] text-center">Olá, {{ auth()->user()->name }} seja bem vindo à galeria In Vetrina</h1>

    <!-- Cards de Estatísticas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white border border-[#A4AC86] rounded-md shadow-md p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-[#656D4A]">Artistas</h2>
            <p class="text-3xl font-bold text-[#333D29]">{{ \App\Models\Artist::count() }}</p>
            <a href="{{ route('artists.index') }}" class="text-[#7F4F24] hover:underline mt-2 inline-block">Ver todos</a>
        </div>
        <div class="bg-white border border-[#A4AC86] rounded-md shadow-md p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-[#656D4A]">Obras</h2>
            <p class="text-3xl font-bold text-[#333D29]">{{ \App\Models\Obra::count() }}</p>
            <a href="{{ route('obras.index') }}" class="text-[#7F4F24] hover:underline mt-2 inline-block">Ver todos</a>
        </div>
        <div class="bg-white border border-[#A4AC86] rounded-md shadow-md p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-[#656D4A]">Exposições</h2>
            <p class="text-3xl font-bold text-[#333D29]">{{ \App\Models\Exposicao::count() }}</p>
            <a href="{{ route('exposicoes.index') }}" class="text-[#7F4F24] hover:underline mt-2 inline-block">Ver todas</a>
        </div>
        <div class="bg-white border border-[#A4AC86] rounded-md shadow-md p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-[#656D4A]">Logísticas</h2>
            <p class="text-3xl font-bold text-[#333D29]">{{ \App\Models\Logistica::count() }}</p>
            <a href="{{ route('logisticas.index') }}" class="text-[#7F4F24] hover:underline mt-2 inline-block">Ver todas</a>
        </div>
    </div>

    <!-- Botões de ação rápida -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <a href="{{ route('artists.create') }}" class="bg-[#7F4F24] text-white px-6 py-3 rounded-md shadow hover:bg-[#582F0E] text-center transition">+ Novo artista</a>
        <a href="{{ route('obras.create') }}" class="bg-[#A4AC86] text-[#333D29] px-6 py-3 rounded-md shadow hover:bg-[#656D4A] hover:text-white text-center transition">+ Nova obra</a>
        <a href="{{ route('exposicoes.create') }}" class="bg-[#656D4A] text-white px-6 py-3 rounded-md shadow hover:bg-[#333D29] text-center transition">+ Nova exposição</a>
        <a href="{{ route('logisticas.create') }}" class="bg-[#333D29] text-white px-6 py-3 rounded-md shadow hover:bg-black text-center transition">+ Nova logística</a>
    </div>

    <!-- Últimos registros -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Últimos artistas -->
        <div class="bg-white border border-[#A4AC86] rounded-md shadow-md p-6">
            <h3 class="text-lg font-semibold text-[#656D4A] mb-4">Últimos artistas</h3>
            <ul class="space-y-2">
                @foreach(\App\Models\Artist::latest()->take(5)->get() as $artist)
                    <li class="flex justify-between border-b border-[#A4AC86] py-2">
                        <span class="text-[#333D29]">{{ $artist->nome }}</span>
                        <span class="text-[#7F4F24] text-sm">{{ $artist->nacionalidade }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Últimas exposições -->
        <div class="bg-white border border-[#A4AC86] rounded-md shadow-md p-6">
            <h3 class="text-lg font-semibold text-[#656D4A] mb-4">Últimas exposições</h3>
            <ul class="space-y-2">
                @foreach(\App\Models\Exposicao::latest()->take(5)->get() as $expo)
                    <li class="flex justify-between border-b border-[#A4AC86] py-2">
                        <span class="text-[#333D29]">{{ $expo->nome }}</span>
                        <span class="text-[#7F4F24] text-sm">{{ \Carbon\Carbon::parse($expo->data_inicio)->format('d/m/Y') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
