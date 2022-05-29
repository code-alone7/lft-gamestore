@if($randomProduct)
<div class="random-product-container">
  <div class="random-product-container__head">{{ __('Random product') }}</div>
  <div class="random-product-container__content">
    <div class="item-product">
      <div class="item-product__title-product"><a href="#" class="item-product__title-product__link">{{ $randomProduct->title }}</a></div>
      <div class="item-product__thumbnail"><a href="#" class="item-product__thumbnail__link"><img src="{{ $randomProduct->photo }}" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
      <div class="item-product__description">
        <div class="item-product__description__products-price"><span class="products-price">{{ $randomProduct->price }} {{ __('Rub.') }}</span></div>
        <div class="item-product__description__btn-block"><a href="#" class="btn btn-blue">{{ __("Buy") }}</a></div>
      </div>
    </div>
  </div>
</div>
@endif