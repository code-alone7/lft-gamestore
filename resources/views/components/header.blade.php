<header class="main-header">
  <div class="logotype-container"><a href="#" class="logotype-link"><img src="img/logo.png" alt="Логотип"></a></div>
  <nav class="main-navigation">
    <ul class="nav-list">
      <li class="nav-list__item"><a href="#" class="nav-list__item__link">Главная</a></li>
      <li class="nav-list__item"><a href="#" class="nav-list__item__link">Мои заказы</a></li>
      <li class="nav-list__item"><a href="#" class="nav-list__item__link">Новости</a></li>
      <li class="nav-list__item"><a href="#" class="nav-list__item__link">О компании</a></li>
    </ul>
  </nav>
  <div class="header-contact">
    <div class="header-contact__phone"><a href="Tel: {{ $phone }}" class="header-contact__phone-link">Телефон: {{ $phone }}</a></div>
  </div>
  <div class="header-container">
    {{ $slot }}
  </div>
</header>
