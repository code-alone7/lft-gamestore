<x-app-layout :title="__('page.title', ['title' => __('Password change')])" :header="__('Password change')">

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <form class="form" method="POST" action="{{ route('password.update') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email Address -->
    <div class="form__row form-row">
      <div class="form-row__cell form-cell">
        <label for="email" class="form-cell__label form-label">{{ __('Email') }}</label>
        <input id="email" type="text" class="form-cell__input form-input" name="email" value="{{ old('email') }}" required autofocus>
      </div>
    </div>

    <!-- Password -->
    <div class="form__row form-row">
      <div class="form-row__cell form-cell">
        <label for="password" class="form-cell__label form-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-cell__input form-input" name="password"  required>
      </div>
      <div class="form-row__cell form-cell">
        <label for="password_confirmation" class="form-cell__label form-label">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" type="password" class="form-cell__input form-input" name="password_confirmation"  required>
      </div>
    </div>
      
    <div class="form__row form-row">
      <div class="form-row__cell form-row__cell--unstretched form-cell">
        <button class="form-input form-input--button">{{ __('Reset Password') }}</button>
      </div>
    </div>
  </form>
</x-app-layout>
