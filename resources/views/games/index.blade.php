<x-app-layout title="{{ $genre->title }} | Gamestore" header="Игры категории {{ $genre->title }}" :paginator="$games">
  <x-products :content="$games" />
</x-app-layout>
