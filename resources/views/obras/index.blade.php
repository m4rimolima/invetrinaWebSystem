@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Lista de Obras</h1>

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botão Adicionar Obra -->
    <div class="mb-4">
        <a href="{{ route('obras.create') }}" 
           class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">
           Adicionar Obra
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Imagem</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Título</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Artista</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ano</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Técnica</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($obras as $obra)
                <tr class="border-b">
                    <!-- Imagem -->
                    <td class="px-6 py-4">
                        @if($obra->imagem)
                            <img src="{{ asset('storage/' . $obra->imagem) }}" 
                                 alt="{{ $obra->titulo }}" 
                                 class="w-20 h-20 object-cover rounded">
                        @else
                            <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center text-gray-500">
                                Sem Imagem
                            </div>
                        @endif
                    </td>

                    <!-- Título -->
                    <td class="px-6 py-4 text-gray-800">{{ $obra->titulo }}</td>

                    <!-- Artista -->
                    <td class="px-6 py-4 text-gray-800">{{ $obra->artist->nome ?? '-' }}</td>

                    <!-- Ano -->
                    <td class="px-6 py-4 text-gray-800">{{ $obra->ano ?? '-' }}</td>

                    <!-- Técnica -->
                    <td class="px-6 py-4 text-gray-800">{{ $obra->tecnica ?? '-' }}</td>

                    <!-- Ações -->
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('obras.edit', $obra->id) }}" 
                           class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                           Editar
                        </a>
                        <form action="{{ route('obras.destroy', $obra->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                                    onclick="return confirm('Tem certeza que deseja excluir esta obra?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        Nenhuma obra encontrada.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <div class="mt-4">
        {{ $obras->links() }}
    </div>
</div>
@endsection
