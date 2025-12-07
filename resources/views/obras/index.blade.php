@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6" style="color:#333D29;">Lista de Obras</h1>

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="px-4 py-3 mb-4 rounded border" 
             style="background:#A4AC86; border-color:#7F4F24; color:#333D29;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botão Adicionar Obra -->
    <div class="mb-4">
        <a href="{{ route('obras.create') }}" 
           class="text-white px-4 py-2 rounded"
           style="background:#333D29;">
           Adicionar Obra
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full shadow rounded" 
               style="background:#F8F8F5; border:1px solid #A4AC86;">
            <thead style="background:#A4AC86;">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium " style="color:#333D29;">Imagem</th>
                    <th class="px-6 py-3 text-left text-sm font-medium" style="color:#333D29;">Título</th>
                    <th class="px-6 py-3 text-left text-sm font-medium" style="color:#333D29;">Artista</th>
                    <th class="px-6 py-3 text-left text-sm font-medium" style="color:#333D29;">Ano</th>
                    <th class="px-6 py-3 text-left text-sm font-medium" style="color:#333D29;">Técnica</th>
                    <th class="px-6 py-3 text-left text-sm font-medium" style="color:#333D29;">Ações</th>
                </tr>
            </thead>

            <tbody>
                @forelse($obras as $obra)
                <tr style="border-bottom:1px solid #A4AC86;">
                    <!-- Imagem -->
                    <td class="px-6 py-4">
                        @if($obra->imagem)
                            <img src="{{ asset('storage/' . $obra->imagem) }}" 
                                 alt="{{ $obra->titulo }}" 
                                 class="w-20 h-20 object-cover rounded border"
                                 style="border-color:#A4AC86;">
                        @else
                            <div class="w-20 h-20 rounded flex items-center justify-center"
                                 style="background:#A4AC86; color:#333D29;">
                                Sem Imagem
                            </div>
                        @endif
                    </td>

                    <!-- Título -->
                    <td class="px-6 py-4" style="color:#333D29;">{{ $obra->titulo }}</td>

                    <!-- Artista -->
                    <td class="px-6 py-4" style="color:#333D29;">{{ $obra->artist->nome ?? '-' }}</td>

                    <!-- Ano -->
                    <td class="px-6 py-4" style="color:#333D29;">{{ $obra->ano ?? '-' }}</td>

                    <!-- Técnica -->
                    <td class="px-6 py-4" style="color:#333D29;">{{ $obra->tecnica ?? '-' }}</td>

                    <!-- Ações -->
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('obras.edit', $obra->id) }}" 
                           class="px-3 py-1 rounded text-white"
                           style="background:#656D4A;">
                           Editar
                        </a>

                        <form action="{{ route('obras.destroy', $obra->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" 
                                    class="px-3 py-1 rounded text-white"
                                    style="background:#7F4F24;"
                                    onclick="return confirm('Tem certeza que deseja excluir esta obra?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center"
                        style="color:#333D29;">
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
@extends('layouts.app')