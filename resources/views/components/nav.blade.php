<nav class="main-navigation">
  <ul class="nav-list">
    @foreach($links as $link)
      <li class="nav-list__item"><a href="{{ $link['href'] }}" class="nav-list__item__link">{{ $link['title'] }}</a></li>
    @endforeach
  </ul>
</nav>
