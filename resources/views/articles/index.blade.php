<x-app-layout title="Last News | GameStore" header="Latest News">
  <div class="news-list__container">
    @foreach($articles as $article)
      <div class="news-list__item">
        <div class="news-list__item__thumbnail"><img src="{{ $article->photo }}"></div>
        <div class="news-list__item__content">
          <div class="news-list__item__content__news-title">{{ $article->short_header }}</div>
          <div class="news-list__item__content__news-date">{{ $article->created_at }}</div>
          <div class="news-list__item__content__news-content">
            {{ $article->shortContent() }}
          </div>
        </div>
        <div class="news-list__item__content__news-btn-wrap"><a href="{{ route('articles.show', ['article' => $article->id]) }}" class="btn btn-brown">Подробнее</a></div>
      </div>
    @endforeach
  </div>

  <x-slot:contentFooter>
    {{ $articles->links() }}
  </x-slot:contentFooter>
</x-app-layout>