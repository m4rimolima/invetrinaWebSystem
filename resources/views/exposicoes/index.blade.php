@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-[#333D29]">Lista de Exposições</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('exposicoes.create') }}" 
        class="bg-[#7F4F24] text-white px-4 py-2 rounded hover:bg-[#582F0E] mb-4 inline-block transition">
        Adicionar Exposição
    </a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow-md">
            <thead>
                <tr class="bg-[#A4AC86] text-[#333D29]">
                    <th class="py-2 px-4 border-b">Obra</th>
                    <th class="py-2 px-4 border-b">Nome</th>
                    <th class="py-2 px-4 border-b">Local</th>
                    <th class="py-2 px-4 border-b">Data Início</th>
                    <th class="py-2 px-4 border-b">Data Fim</th>
                    <th class="py-2 px-4 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($exposicoes as $exposicao)
                    <tr class="text-[#333D29] hover:bg-[#A4AC8633] transition">
                        <td class="py-2 px-4 border-b">{{ $exposicao->obra->titulo ?? '-' }}</td>
                        <td class="py-2 px-4 border-b">{{ $exposicao->nome }}</td>
                        <td class="py-2 px-4 border-b">{{ $exposicao->local }}</td>
                        <td class="py-2 px-4 border-b">
                            {{ \Carbon\Carbon::parse($exposicao->data_inicio)->format('d/m/Y') }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ \Carbon\Carbon::parse($exposicao->data_fim)->format('d/m/Y') }}
                        </td>

                        <td class="py-2 px-4 border-b space-x-2">
                            <a href="{{ route('exposicoes.edit', $exposicao->id) }}"
                                class="bg-[#7F4F24] text-white px-4 py-1 rounded hover:bg-[#582F0E] inline-block transition">
                                Editar
                            </a>

                            <form action="{{ route('exposicoes.destroy', $exposicao->id) }}" method="POST" 
                                class="inline-block"
                                onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-[#656D4A] text-white px-4 py-1 rounded hover:bg-[#333D29] inline-block transition">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">
                            Nenhuma exposição cadastrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $exposicoes->links() }}
    </div>

</div>
@endsection
@extends('layouts.app')