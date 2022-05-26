<div class="products-category__list__item">
  <div class="products-category__list__item__title-product"><a href="{{ $showHref }}">{{ $title }}</a></div>
  <div class="products-category__list__item__thumbnail"><a href="{{ $showHref }}" class="products-category__list__item__thumbnail__link"><img src="{{ $photo }}" alt="Preview-image"></a></div>
  <form method="POST" action="{{ $buyHref }}" class="products-category__list__item__description">
    @csrf
    <span class="products-price">{{ $price }} руб.</span>
    <button type="submit" class="btn btn-blue">Купить</button>
  </form>
</div>
