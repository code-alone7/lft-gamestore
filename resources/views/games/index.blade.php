<x-app-layout :title="__('page.title', ['title' => $genre->title])" :header="__('headers.games', ['genre' => $genre->title])">
  <x-products :content="$games" />

  <x-slot:contentFooter>
    {{ $games->links() }}
  </x-slot:contentFooter>
</x-app-layout>
