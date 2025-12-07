@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white">
    <h1 class="text-2xl font-semibold mb-6 text-[#333D29]">Lista de Artistas</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('artists.create') }}" class="bg-[#7F4F24] text-white px-4 py-2 rounded-md shadow hover:bg-[#582F0E] transition">Adicionar Artista</a>
    </div>

    <div class="overflow-x-auto bg-white border border-[#A4AC86] rounded-md shadow-md">
        <table class="min-w-full divide-y divide-[#A4AC86]">
            <thead class="bg-[#F5F5F0]">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#656D4A] uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#656D4A] uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#656D4A] uppercase tracking-wider">Nacionalidade</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#656D4A] uppercase tracking-wider">Biografia</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-[#656D4A] uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-[#A4AC86]">
                @forelse($artists as $artist)
                <tr class="hover:bg-[#F9F9F6] transition">
                    <td class="px-6 py-4 whitespace-nowrap text-[#333D29]">{{ $artist->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-[#333D29]">{{ $artist->nome }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-[#333D29]">{{ $artist->nacionalidade }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-[#333D29] max-w-xs truncate">{{ $artist->biografia }}</td>
                    <td class="px-6 py-4 whitespace-nowrap space-x-3">
                        <a href="{{ route('artists.edit', $artist->id) }}" class="text-[#7F4F24] hover:underline">Editar</a>
                        <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Tem certeza que deseja excluir este artista?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Nenhum artista encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $artists->links() }}
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Lista de Artistas</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('artists.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Adicionar Artista</a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow-sm border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nacionalidade</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Biografia</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($artists as $artist)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $artist->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $artist->nome }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $artist->nacionalidade }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $artist->biografia }}</td>
                    <td class="px-6 py-4 whitespace-nowrap space-x-2">
                        <a href="{{ route('artists.edit', $artist->id) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Tem certeza que deseja excluir este artista?')" >Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Nenhum artista encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $artists->links() }}
    </div>
</div>
@endsection