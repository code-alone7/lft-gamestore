<x-app-layout title="Gamestore home page" header="Последние новинки" content-top>
  <div class="products-category__list">
    @foreach($games as $game)
      <div class="products-category__list__item">
        <div class="products-category__list__item__title-product"><a href="#">{{ $game->title }}</a></div>
        <div class="products-category__list__item__thumbnail"><a href="#" class="products-category__list__item__thumbnail__link"><img src="{{ $game->photo }}" alt="Preview-image"></a></div>
        <div class="products-category__list__item__description"><span class="products-price">{{ $game->price }} руб.</span><a href="#" class="btn btn-blue">Купить</a></div>
      </div>
    @endforeach
  </div>
</x-app-layout>
