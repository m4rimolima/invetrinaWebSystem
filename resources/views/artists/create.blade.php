<x-app-layout>
<div class="max-w-2xl mx-auto py-8">
  <h2 class="text-2xl font-bold mb-4">Novo Artista</h2>

  @if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
      <ul class="list-disc pl-5">
        @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('artists.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
      <label class="block font-semibold">Nome</label>
      <input type="text" name="nome" value="{{ old('nome') }}" class="w-full border rounded p-2" required>
    </div>
    <div>
      <label class="block font-semibold">Nacionalidade</label>
      <input type="text" name="nacionalidade" value="{{ old('nacionalidade') }}" class="w-full border rounded p-2">
    </div>
    <div>
      <label class="block font-semibold">Data de Nascimento</label>

    </div>
    <div>
      <label class="block font-semibold">Biografia</label>
      <textarea name="biografia" class="w-full border rounded p-2">{{ old('biografia') }}</textarea>
    </div>

    <div>
      <button class="bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
      <a href="{{ route('artists.index') }}" class="ml-2 text-gray-600">Voltar</a>
    </div>
  </form>
</div>
</x-app-layout>
