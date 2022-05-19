<div class="main-content">
  @if($contentTop)
    <x-content.top/>
  @endif
  <div class="content-middle">
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">{{ $header }}</div>
      </div>
      <div class="content-head__search-block">
        <div class="search-container">
          <form class="search-container__form">
            <input type="text" class="search-container__form__input">
            <button class="search-container__form__btn">search</button>
          </form>
        </div>
      </div>
    </div>
    <div class="content-main__container">
      {{ $slot }}
    </div>
    <div class="content-footer__container">
      <ul class="page-nav">
        <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
      </ul>
    </div>
  </div>
  @isset($headerBottom, $contentBottom)
    <x-content.bottom :header="$headerBottom">
      {{ $contentBottom }}
    </x-content.bottom>
  @endisset
</div>
