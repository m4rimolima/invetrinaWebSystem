<x-app-layout>
<div class="max-w-6xl mx-auto py-8">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Artistas</h2>
    <a href="{{ route('artists.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Novo Artista</a>
  </div>

  @if(session('success'))
    <div class="p-3 bg-green-100 text-green-800 rounded mb-4">{{ session('success') }}</div>
  @endif

  <table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-100">
      <tr>
        <th class="px-4 py-2 text-left">Nome</th>
        <th class="px-4 py-2 text-left">Nacionalidade</th>
        <th class="px-4 py-2 text-left">Estilo</th>
        <th class="px-4 py-2">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($artists as $artist)
      <tr class="border-t">
        <td class="px-4 py-2">{{ $artist->nome }}</td>
        <td class="px-4 py-2">{{ $artist->nacionalidade }}</td>
        <td class="px-4 py-2">{{ $artist->estilo_arte }}</td>
        <td class="px-4 py-2">
          <a href="{{ route('artists.show', $artist) }}" class="text-blue-600 mr-2">Ver</a>
          <a href="{{ route('artists.edit', $artist) }}" class="text-yellow-600 mr-2">Editar</a>
          <form action="{{ route('artists.destroy', $artist) }}" method="POST" class="inline-block" onsubmit="return confirm('Excluir?')">
            @csrf @method('DELETE')
            <button class="text-red-600">Excluir</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">
    {{ $artists->links() }}
  </div>
</div>
</x-app-layout>
