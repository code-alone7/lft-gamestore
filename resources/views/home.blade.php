<x-app-layout :title="__('page.title', ['title' => __('Home Page')])" :header="__('headers.home')" content-top>
  <x-products :content="$games" />

  <x-slot:contentFooter>
    {{ $games->links() }}
  </x-slot:contentFooter>
</x-app-layout>
