@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Logísticas</h1>


@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('logisticas.create') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 mb-4 inline-block">
    Adicionar Logística
</a>

<div class="overflow-x-auto">
    <table class="w-full border border-gray-300 rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border-b text-left">ID</th>
                <th class="py-2 px-4 border-b text-left">Obra</th>
                <th class="py-2 px-4 border-b text-left">Responsável</th>
                <th class="py-2 px-4 border-b text-left">Local de Origem</th>
                <th class="py-2 px-4 border-b text-left">Local de Destino</th>
                <th class="py-2 px-4 border-b text-left">Data Transporte</th>
                <th class="py-2 px-4 border-b text-left">Criado em</th>
                <th class="py-2 px-4 border-b text-left">Atualizado em</th>
                <th class="py-2 px-4 border-b text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logisticas as $logistica)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $logistica->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $logistica->obra->titulo ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $logistica->responsavel }}</td>
                    <td class="py-2 px-4 border-b">{{ $logistica->local_origem }}</td>
                    <td class="py-2 px-4 border-b">{{ $logistica->local_destino }}</td>
                    <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($logistica->data_transporte)->format('d/m/Y') }}</td>
                    <td class="py-2 px-4 border-b">{{ $logistica->created_at->format('d/m/Y H:i') }}</td>
                    <td class="py-2 px-4 border-b">{{ $logistica->updated_at->format('d/m/Y H:i') }}</td>
                    <td class="py-2 px-4 border-b flex justify-center gap-2">
                        <a href="{{ route('logisticas.edit', $logistica->id) }}" 
                           class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-500 text-sm">
                           Editar
                        </a>
                        <form action="{{ route('logisticas.destroy', $logistica->id) }}" method="POST" 
                              onsubmit="return confirm('Tem certeza que deseja excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-500 text-sm">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="py-4 px-4 text-center text-gray-500">Nenhuma logística encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $logisticas->links() }}
</div>


</div>
@endsection
