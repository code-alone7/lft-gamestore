<x-app-layout :title="__('page.title', ['title' => __('Your orders')])" header="Ваши заказы">
  <ul class="orders">
    @foreach ($orders as $order)
      <li class="orders__item">
        <div class="order">
          <div class="order__date">
            {{ $order->updated_at->format('d/m/y G:i') }}
          </div>
          <ul class="order__info">
            <li class="order__info-item">
              @php
                $count = $order->games()->count();
                $lastDigit = $count % 10;
                echo $count . ' Иг' . ($lastDigit != 1 ?
                    (($lastDigit > 1) && ($lastDigit < 5) ? 'ры' : 'ор') :
                    'ра')
              @endphp
            </li>
            <li class="order__info-item">
              {{ $order->games()->sum('price') }} {{ __('Rub.') }}
            </li>
            <li class="order__info-item">
              @switch($order->getStatus())
                  @case(config('orders.status_paid'))
                    Выполнен
                    @break
                  @case(config('orders.status_unpaid'))
                    Текущий
                    @break
                  @case(config('orders.status_canceld'))
                    Отменен
                    @break
                    @default                      
              @endswitch
            </li>
            <li class="order__info-item">
              <a href="{{ route('order.show', ['order' => $order->id]) }}" class="order__btn btn">{{ __('More') }}</a>
            </li>
          </ul>
        </div>
      </li>
    @endforeach
  </ul>

  {{-- <div class="cart-product-list">
    @foreach ($orders as $order)
      <div class="cart-product-list__item">
        <div class="cart-product__item__product-name">
          <div class="cart-product__item__product-name__content"><a href="#">{{ $order->status->title }}</a></div>
        </div>
        <div class="cart-product__item__cart-date">
          <div class="cart-product__item__cart-date__content">{{ $order->updated_at->format('d/m/Y') }}</div>
        </div>
        <div class="cart-product__item__product-price">
          <span class="product-price__value">{{ $order->games()->count() }}</span>
        </div>
      </div>
    @endforeach
  </div> --}}
</x-app-layout>
