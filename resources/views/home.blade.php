<x-app-layout title="Gamestore home page" header="Последние новинки" content-top>
  <x-products :content="$games" />

  <x-slot:contentFooter>
    {{ $games->links() }}
  </x-slot:contentFooter>
</x-app-layout>
