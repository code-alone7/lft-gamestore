<div class="products-category__list">
  @foreach($content as $product)
    <x-product
      :title="$product->title"
      :price="$product->price"
      :photo="$product->photo"
      buy-href="{{ route('order.add-game', ['game' => $product->id]) }}"
      show-href="{{ route('games.show', ['game' => $product->id]) }}" />
  @endforeach
</div>
