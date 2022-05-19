<footer class="footer">
  <div class="footer__footer-content">
    <x-random-product/>
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
