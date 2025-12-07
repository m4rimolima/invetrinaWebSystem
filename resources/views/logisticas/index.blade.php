

@section('content')

<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4 text-[#333D29]">Logísticas</h1>

  
    @if(session('success'))
        <div class="bg-[#A4AC86] border border-[#656D4A] text-[#333D29] px-4 py-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

   
    <a href="{{ route('logisticas.create') }}" 
       class="bg-[#7F4F24] text-white px-4 py-2 rounded-md hover:bg-[#582F0E] transition mb-4 inline-block">
        Adicionar Logística
    </a>

    <div class="overflow-x-auto">
        <table class="w-full border border-[#A4AC86] rounded-md overflow-hidden">

            <thead class="bg-[#A4AC86] text-[#333D29]">
                <tr>
                    <th class="py-2 px-4 border-b border-[#656D4A] text-left">ID</th>
                    <th class="py-2 px-4 border-b border-[#656D4A] text-left">Obra</th>
                    <th class="py-2 px-4 border-b border-[#656D4A] text-left">Responsável</th>
                    <th class="py-2 px-4 border-b border-[#656D4A] text-left">Local de Origem</th>
                    <th class="py-2 px-4 border-b border-[#656D4A] text-left">Local de Destino</th>
                    <th class="py-2 px-4 border-b border-[#656D4A] text-left">Data Transporte</th>
                    <th class="py-2 px-4 border-b border-[#656D4A] text-left">Ações</th>
                </tr>
            </thead>

            <tbody>
                @forelse($logisticas as $logistica)
                    <tr class="hover:bg-[#F5F5F0] transition">
                        <td class="py-2 px-4 border-b border-[#A4AC86]">{{ $logistica->id }}</td>
                        <td class="py-2 px-4 border-b border-[#A4AC86]">{{ $logistica->obra->titulo ?? '-' }}</td>
                        <td class="py-2 px-4 border-b border-[#A4AC86]">{{ $logistica->responsavel }}</td>
                        <td class="py-2 px-4 border-b border-[#A4AC86]">{{ $logistica->local_origem }}</td>
                        <td class="py-2 px-4 border-b border-[#A4AC86]">{{ $logistica->local_destino }}</td>
                        <td class="py-2 px-4 border-b border-[#A4AC86]">
                            {{ \Carbon\Carbon::parse($logistica->data_transporte)->format('d/m/Y') }}
                        </td>

                      
                        <td class="py-2 px-4 border-b border-[#A4AC86] flex items-center gap-2">

                           
                            <a href="{{ route('logisticas.edit', $logistica->id) }}"
                               class="px-3 py-1 rounded-md bg-[#A4AC86] text-[#333D29] hover:bg-[#7F4F24] hover:text-white transition text-sm">
                               Editar
                            </a>

                            <form action="{{ route('logisticas.destroy', $logistica->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="px-3 py-1 rounded-md bg-[#656D4A] text-white hover:bg-[#333D29] transition text-sm">
                                    Excluir
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="py-4 px-4 text-center text-[#656D4A]">
                            Nenhuma logística encontrada.
                        </td>
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
@extends('layouts.app')