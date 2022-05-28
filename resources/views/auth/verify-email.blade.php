<x-app-layout :title="('title' => __('Email confirmation'))" :header="__('Confirm your email')">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form class="form" method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="form__row form-row">
                <div class="form-row__cell form-row__cell--unstretched form-cell">
                    <button class="form-input form-input--button">Отправить заново</button>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-green-600 hover:text-green-900 mb-2">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-app-layout>