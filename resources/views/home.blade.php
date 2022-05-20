<x-app-layout title="Gamestore home page" header="Последние новинки" content-top :paginator="$games">
  <x-products :content="$games" />
</x-app-layout>
