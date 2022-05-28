<x-app-layout :title="__('page.title', ['title' => __('Password confirmation')])" :header="__('Confirm you password')">

  <div class="mb-4 text-sm text-gray-600">
    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
  </div>

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <form class="form" method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <!-- Password -->
    <div class="form__row form-row">
      <div class="form-row__cell form-cell">
        <label for="password" class="form-cell__label form-label">Пароль</label>
        <input id="password" type="password" class="form-cell__input form-input" name="password"  required autocomplete="current-password" autofocus>
      </div>
    </div>

    <div class="form__row form-row">
      <div class="form-row__cell form-row__cell--unstretched form-cell">
        <button class="form-input form-input--button">Подтверждение</button>
      </div>
    </div>
  </form>
</x-app-layout>
