<header class="main-header">
  <div class="logotype-container"><a href="{{ route('home') }}" class="logotype-link"><img src="{{ asset('img/logo.png') }}" alt="Логотип"></a></div>
  <x-nav/>
  <div class="header-contact">
    <div class="header-contact__phone"><a href="Tel: {{ $phone }}" class="header-contact__phone-link">Телефон: {{ $phone }}</a></div>
  </div>
  <div class="header-container">
    {{ $slot }}
  </div>
</header>
