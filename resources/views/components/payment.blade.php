@php $productCount = Auth::user() ? Auth::user()->gamesInOrderCount() : 0; @endphp
<div class="payment-container">
  <div class="payment-basket__status">
    <div class="payment-basket__status__icon-block">
      <a href="{{ route('cart') }}" class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a>
    </div>
    <div class="payment-basket__status__basket">
      <span class="payment-basket__status__basket-value">{{ $productCount }}</span>
      <span class="payment-basket__status__basket-value-descr">{{ trans_choice('content.products', $productCount) }}</span>
    </div>
  </div>
</div>
