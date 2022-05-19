<footer class="footer">
  <div class="footer__footer-content">
    <div class="random-product-container">
      <div class="random-product-container__head">Случайный товар</div>
      <div class="random-product-container__content">
        <div class="item-product">
          <div class="item-product__title-product"><a href="#" class="item-product__title-product__link">The Witcher 3: Wild Hunt</a></div>
          <div class="item-product__thumbnail"><a href="#" class="item-product__thumbnail__link"><img src="img/cover/game-1.jpg" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
          <div class="item-product__description">
            <div class="item-product__description__products-price"><span class="products-price">400 руб</span></div>
            <div class="item-product__description__btn-block"><a href="#" class="btn btn-blue">Купить</a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__footer-content__main-content">
      {{ $slot }}
    </div>
  </div>
  <div class="footer__social-block">
    <ul class="social-block__list bcg-social">
      <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
      <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
      <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
    </ul>
  </div>
</footer>
