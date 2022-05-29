<x-app-layout :title="__('page.title', ['title' => __('Order') . ' ' . $order->updated_at->format('d/m/Y')])" header="Текущий заказ">
  <div class="cart-product-list">
    @foreach($order->games as $game)
      <div class="cart-product-list__item">
        <div class="cart-product__item__product-photo">
          <img src="{{ $game->photo }}"class="cart-product__item__product-photo__image">
        </div>
        <div class="cart-product__item__product-name">
          <div class="cart-product__item__product-name__content"><a href="#">{{ $game->title }}</a></div>
        </div>
        <div class="cart-product__item__cart-date">
          <div class="cart-product__item__cart-date__content">{{ $game->created_at->format('d/m/Y') }}</div>
        </div>
        <div class="cart-product__item__product-price"><span class="product-price__value">{{ $game->price }} {{ trans_choice('content.rubles', $game->price) }}</span></div>
        <div class="cart-product__item__product-remove">
          <form method="POST" action="{{ route('order.remove-game', ['game' => $game->id]) }}">
            @csrf
            <button type="submit" class="btn bg-red-700 text-white">{{ __('Cancel') }}</button>
          </form>
        </div>
      </div>
    @endforeach

    @php $sumPrice = $order->games->sum('price') @endphp
    <div class="cart-product-list__result-item">
      <div class="cart-product-list__result-item__text">{{ __('Total') }}</div>
      <div class="cart-product-list__result-item__value">{{ $sumPrice }} {{ trans_choice('content.rubles', $sumPrice) }}</div>
    </div>
  </div>
</x-app-layout>
