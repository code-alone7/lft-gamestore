<x-app-layout :title="__('page.title', ['title' => __('Password recovery')])" :header="__('Password recovery')">

  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <form class="form" method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div class="form__row form-row">
      <div class="form-row__cell form-cell">
        <label for="email" class="form-cell__label form-label">{{ __('Email') }}</label>
        <input id="email" type="text" class="form-cell__input form-input" name="email" value="{{ old('email') }}"
          required>
      </div>
    </div>

    <div class="form__row form-row">
      <div class="form-row__cell form-row__cell--unstretched form-cell">
        <button class="form-input form-input--button">{{ __('Email Password Reset Link') }}</button>
      </div>
    </div>
  </form>
</x-app-layout>
