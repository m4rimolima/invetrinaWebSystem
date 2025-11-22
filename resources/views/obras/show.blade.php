@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $obra->titulo }}</h1>

    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>Artista:</strong> {{ $obra->artist->nome ?? 'N/A' }}</p>
        <p><strong>Ano:</strong> {{ $obra->ano ?? '-' }}</p>
        <p><strong>Técnica:</strong> {{ $obra->tecnica ?? '-' }}</p>
    </div>

    <a href="{{ route('obras.index') }}" class="mt-4 inline-block text-gray-600 hover:text-gray-900">Voltar</a>
</div>
@endsection
