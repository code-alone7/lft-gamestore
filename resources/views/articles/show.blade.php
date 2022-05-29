<x-app-layout :title="__('page.title', ['title' => $article->header])" :header="__('headers.article', ['name' => $article->short_header])">
  <div class="news-block content-text">
    <h3 class="content-text__title">
      {{ $article->header }}
    </h3>
    <img src="{{ $article->photo }}" alt="Image" class="alignleft img-news">
    {!! $article->content !!}
  </div>

  <x-slot:headerBottom>
    Посмотрите наши товары
  </x-slot:headerBottom>

  <x-slot:contentBottom>
    <x-products :content="$games" />
  </x-slot:contentBottom>
</x-app-layout>