<x-app-layout :title="__('page.title', ['title' => $game->title])" :header="__('headers.game', ['name' => $game->title])">
  <div class="product-container">
    <div class="product-container__image-wrap"><img src="{{ $game->photo }}" class="image-wrap__image-product"></div>
    <div class="product-container__content-text">
      <div class="product-container__content-text__title">{{ $game->title }}</div>
      <form method="POST" action="{{ route('order.add-game', ['game' => $game->id]) }}" class="product-container__content-text__price">
        <div class="product-container__content-text__price__value">
          Цена: <b>{{ $game->price }}</b>
          руб
        </div>
        @csrf
        <button type="submit" class="btn btn-blue">Купить</button>
      </form>
      <div class="product-container__content-text__description content-text">
        {!! $game->description !!}
      </div>
    </div>
  </div>

  <x-slot:headerBottom>
    Смотрите также
  </x-slot:headerBottom>

  <x-slot:contentBottom>
    <x-products :content="$recommendations" />
  </x-slot:contentBottom>
</x-app-layout>
