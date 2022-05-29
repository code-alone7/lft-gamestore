<x-app-layout title="{{ $genre->title }} | Gamestore" header="Игры категории {{ $genre->title }}">
  <x-products :content="$games" />

  <x-slot:contentFooter>
    {{ $games->links() }}
  </x-slot:contentFooter>
</x-app-layout>
