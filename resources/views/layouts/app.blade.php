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
        <x-payment />
        <div class="authorization-block">
          @auth
            <span class="authorization-block__link">{{ __('Profile') }}</span>
            <form method="POST" action="{{ route('logout') }}">            
              @csrf  
              <button type="submit" class="authorization-block__link">{{ __('Log out') }}</button>
            </form>
          @else
            <a href="{{ route('register') }}" class="authorization-block__link">{{ __('Register') }}</a>
            <a href="{{ route('login') }}" class="authorization-block__link">{{ __('Log in') }}</a>
          @endauth
        </div>
      </x-header>
      <div class="middle">
        <x-sidebar/>
        <x-content 
            :header="$header" 
            :content-top="$contentTop" 
            :header-bottom="$headerBottom ?? null" 
            :content-bottom="$contentBottom ?? null" 
            :content-footer="$contentFooter ?? null">
          {{ $slot }}
        </x-content>
      </div>
      <x-footer>
        <p>
          {{ __('footer.message') }}
        </p>
      </x-footer>
      <x-notifications />
    </div>
  </body>
</html>