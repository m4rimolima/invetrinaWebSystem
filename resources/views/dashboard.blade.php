<x-app-layout>
  <div class="py-12 max-w-5xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">In Vetrina — Dashboard</h1>

    @if(session('success'))
      <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <a href="{{ route('artists.index') }}" class="p-6 bg-white shadow rounded-lg text-center">Artistas</a>
      <a href="{{ route('obras.index') }}" class="p-6 bg-white shadow rounded-lg text-center">Obras</a>
      <a href="{{ route('exposicoes.index') }}" class="p-6 bg-white shadow rounded-lg text-center">Exposições</a>
      <a href="{{ route('logisticas.index') }}" class="p-6 bg-white shadow rounded-lg text-center">Logísticas</a>
    </div>
  </div>
</x-app-layout>
