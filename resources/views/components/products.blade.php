<div class="products-category__list">
  @foreach($content as $product)
    <x-product
      :title="$product->title"
      :price="$product->price"
      :photo="$product->photo"
      buy-href="#"
      show-href="#" />
  @endforeach
</div>
