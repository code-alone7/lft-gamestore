<x-app-layout :title="__('page.title', ['titie' => __('Registration')])" :header="__('Registration')">

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <form class="form" method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="form__row form-row">
      <div class="form-row__cell form-cell">
        <label for="name" class="form-cell__label form-label">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-cell__input form-input" name="name" value="{{ old('name') }}" required autofocus>
      </div>
    </div>

    <!-- Email Address -->
    <div class="form__row form-row">
      <div class="form-row__cell form-cell">
        <label for="email" class="form-cell__label form-label">{{ __('Email') }}</label>
        <input id="email" type="text" class="form-cell__input form-input" name="email" value="{{ old('email') }}" required>
      </div>
    </div>

    <!-- Password -->
    <div class="form__row form-row">
      <div class="form-row__cell form-cell">
        <label for="password" class="form-cell__label form-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-cell__input form-input" name="password"  required autocomplete="new-password">
      </div>
      <div class="form-row__cell form-cell">
        <label for="password_confirmation" class="form-cell__label form-label">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" type="password" class="form-cell__input form-input" name="password_confirmation"  required>
      </div>
    </div>

    <a class="underline text-sm text-green-600 hover:text-green-900 mb-2" href="{{ route('login') }}">
      {{ __('Already registered?') }}
    </a>

      
    <div class="form__row form-row">
      <div class="form-row__cell form-row__cell--unstretched form-cell">
        <button class="form-input form-input--button">{{ __('Register') }}</button>
      </div>
    </div>
  </form>
</x-app-layout>
