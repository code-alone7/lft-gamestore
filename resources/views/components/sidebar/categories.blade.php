<ul class="sidebar-category">
  @foreach($sidebarGenres as $genre)
    <li class="sidebar-category__item"><a href="{{ route('games', ['genre-id' => $genre->id]) }}" class="sidebar-category__item__link">{{ $genre->title }}</a></li>
  @endforeach
</ul>
