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
              @php $count = $order->games->count() @endphp
              {{ $count }} {{ trans_choice('content.games', $count % 10) }}
            </li>
            <li class="order__info-item">
              {{ $order->games()->sum('price') }} {{ __('Rub.') }}
            </li>
            <li class="order__info-item">
              {{ __('orders.'.$order->getStatus()) }}
            </li>
            <li class="order__info-item">
              <a href="{{ route('order.show', ['order' => $order->id]) }}" class="order__btn btn">{{ __('More') }}</a>
            </li>
          </ul>
        </div>
      </li>
    @endforeach
  </ul>
</x-app-layout>
