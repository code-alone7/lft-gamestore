@if($randomProduct)
<div class="random-product-container">
  <div class="random-product-container__head">{{ __('Random product') }}</div>
  <div class="random-product-container__content">
    <div class="item-product">
      <div class="item-product__title-product"><a href="#" class="item-product__title-product__link">{{ $randomProduct->title }}</a></div>
      <div class="item-product__thumbnail"><a href="#" class="item-product__thumbnail__link"><img src="{{ $randomProduct->photo }}" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
      <div class="item-product__description">
        <div class="item-product__description__products-price"><span class="products-price">{{ $randomProduct->price }} {{ __('Rub.') }}</span></div>
        <form method="POST" action="{{ route('order.add-game', ['game' => $randomProduct->id]) }}" class="item-product__description__btn-block">
          @csrf
          <button type="submit" class="btn btn-blue">{{ __("Buy") }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif