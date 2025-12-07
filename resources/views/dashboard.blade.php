@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Dashboard</h1>

    <!-- Cards de Estatísticas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-gray-700">Artistas</h2>
            <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Artist::count() }}</p>
            <a href="{{ route('artists.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Ver todos</a>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-gray-700">Obras</h2>
            <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Obra::count() }}</p>
            <a href="{{ route('obras.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Ver todos</a>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-gray-700">Exposições</h2>
            <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Exposicao::count() }}</p>
            <a href="{{ route('exposicoes.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Ver todas</a>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition">
            <h2 class="text-xl font-semibold text-gray-700">Logísticas</h2>
            <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Logistica::count() }}</p>
            <a href="{{ route('logisticas.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Ver todas</a>
        </div>
    </div>

    <!-- Botões de ação rápida com grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <a href="{{ route('artists.create') }}" class="bg-blue-400 text-white px-6 py-3 rounded-2xl shadow hover:bg-blue-500 text-center transition">+ Novo artista</a>
        <a href="{{ route('obras.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-2xl shadow hover:bg-blue-600 text-center transition">+ Nova obra</a>
        <a href="{{ route('exposicoes.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-2xl shadow hover:bg-blue-700 text-center transition">+ Nova exposição</a>
        <a href="{{ route('logisticas.create') }}" class="bg-blue-700 text-white px-6 py-3 rounded-2xl shadow hover:bg-blue-800 text-center transition">+ Nova logística</a>
    </div>

    <!-- Últimos registros -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Últimos artistas -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Últimos artistas</h3>
            <ul class="space-y-2">
                @foreach(\App\Models\Artist::latest()->take(5)->get() as $artist)
                    <li class="flex justify-between border-b py-2">
                        <span>{{ $artist->nome }}</span>
                        <span class="text-gray-500 text-sm">{{ $artist->nacionalidade }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Últimas exposições -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Últimas exposições</h3>
            <ul class="space-y-2">
                @foreach(\App\Models\Exposicao::latest()->take(5)->get() as $expo)
                    <li class="flex justify-between border-b py-2">
                        <span>{{ $expo->nome }}</span>
                        <span class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($expo->data_inicio)->format('d/m/Y') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
