<x-app-layout title="Смена паролья" header="Смена паролья">

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <form class="form" method="POST" action="{{ route('password.update') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
        <input id="password" type="password" class="form-cell__input form-input" name="password"  required>
      </div>
      <div class="form-row__cell form-cell">
        <label for="password_confirmation" class="form-cell__label form-label">Повторите пароль</label>
        <input id="password_confirmation" type="password" class="form-cell__input form-input" name="password_confirmation"  required>
      </div>
    </div>
      
    <div class="form__row form-row">
      <div class="form-row__cell form-row__cell--unstretched form-cell">
        <button class="form-input form-input--button">Сменить пароль</button>
      </div>
    </div>
  </form>
</x-app-layout>
