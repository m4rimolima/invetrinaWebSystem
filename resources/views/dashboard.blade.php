@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Dashboard</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="{{ route('artists.index') }}" class="bg-gray-100 text-gray-800 px-4 py-6 rounded shadow hover:bg-gray-200 text-center transition">
            Artistas
        </a>

        <a href="{{ route('obras.index') }}" class="bg-gray-100 text-gray-800 px-4 py-6 rounded shadow hover:bg-gray-200 text-center transition">
            Obras
        </a>

        <a href="{{ route('exposicoes.index') }}" class="bg-gray-100 text-gray-800 px-4 py-6 rounded shadow hover:bg-gray-200 text-center transition">
            Exposições
        </a>

        <a href="{{ route('logisticas.index') }}" class="bg-gray-100 text-gray-800 px-4 py-6 rounded shadow hover:bg-gray-200 text-center transition">
            Logísticas
        </a>
    </div>
</div>
@endsection
