<div class="sidebar-news">
  @foreach($sidebarArticles as $article)
  <div class="sidebar-news__item">
    <div class="sidebar-news__item__preview-news"><img src="{{ $article->photo }}" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
    <div class="sidebar-news__item__title-news"><a href="{{ route('articles.show', ['article' => $article->id]) }}" class="sidebar-news__item__title-news__link">{{ $article->title }}</a></div>
  </div>
  @endforeach
</div>
