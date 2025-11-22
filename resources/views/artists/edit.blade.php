<x-app-layout>
  <div class="max-w-3xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-4">{{ $artist->nome }}</h2>
    <p class="mb-2"><strong>Nacionalidade:</strong> {{ $artist->nacionalidade }}</p>
    <p class="mb-2"><strong>Data de nascimento:</strong> {{ $artist->data_nascimento?->format('d/m/Y') }}</p>
    <p class="mb-4">{{ $artist->biografia }}</p>

    <h3 class="text-xl font-semibold mb-2">Obras</h3>
    <ul class="list-disc pl-5">
      @foreach($artist->obras as $obra)
        <li><a href="{{ route('obras.show', $obra) }}" class="text-blue-600">{{ $obra->titulo }}</a> ({{ $obra->ano }})</li>
      @endforeach
    </ul>
  </div>
</x-app-layout>
