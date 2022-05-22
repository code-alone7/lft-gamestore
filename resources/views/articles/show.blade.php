<x-app-layout title="{{ $article->title }} | GameStore" header="Новости">
  <div class="news-block content-text">
    <h3 class="content-text__title">
      {{ $article->title }}
    </h3>
    <img src="{{ $article->photo }}" alt="Image" class="alignleft img-news">
    {!! $article->content !!}
  </div>
</x-app-layout>