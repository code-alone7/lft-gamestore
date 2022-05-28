<x-app-layout :title="__('page.title', ['title' => __('Authentication')])" :header="__('Log in')">

  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <form class="form" method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div class="form__row form-row">
      <div class="form-row__cell form-cell">
        <label for="email" class="form-cell__label form-label">Почта</label>
        <input id="email" type="text" class="form-cell__input form-input" name="email" value="{{ old('email') }}" required autofocus>
      </div>
    </div>

    <!-- Password -->
    <div class="form__row form-row">
        <div class="form-row__cell form-cell">
            <label for="password" class="form-cell__label form-label">Пароль</label>
            <input id="password" type="password" class="form-cell__input form-input" name="password"  required autocomplete="new-password">
        </div>
    </div>

    <!-- Remember Me -->    
    <div class="form__row form-row">
      <div class="form-row__cell form-cell form-cell--row">
        <input id="remember_me" type="checkbox" class="form-cell__input form-input form-input--checkbox" name="remember_me">
        <label for="remember_me" class="form-cell__label form-label">Запомни меня</label>
      </div>
    </div>

    @if (Route::has('password.request'))
      <a class="underline text-sm text-green-600 hover:text-green-900 mb-2" href="{{ route('password.request') }}">
        Забыли пароль?
      </a>
    @endif

          
    <div class="form__row form-row">
      <div class="form-row__cell form-row__cell--unstretched form-cell">
        <button class="form-input form-input--button">Вход</button>
      </div>
    </div>
  </form>
</x-app-layout>
