<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/0b65be8ff5.js" crossorigin="anonymous"></script>
  </head>
  <body class="font-sans antialiased">
    <div class="main-wrapper">
      <x-header>
        <x-payment/>
        <div class="authorization-block"><a href="#" class="authorization-block__link">Регистрация</a><a href="#" class="authorization-block__link">Войти</a></div>
      </x-header>
      <div class="middle">
        <x-sidebar/>
        <x-content :header="$header" :content-top="$contentTop" :header-bottom="$headerBottom ?? null" :content-bottom="$contentBottom ?? null">
          {{ $slot }}
        </x-content>
      </div>
      <x-footer>
        <p>
          Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
          онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
          У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
          и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
          коды продления и многое друго. Также здесь всегда можно узнать последние новости
          из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
          актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
          что немаловажно, выгодно!
        </p>
      </x-footer>
    </div>
  </body>
</html>
