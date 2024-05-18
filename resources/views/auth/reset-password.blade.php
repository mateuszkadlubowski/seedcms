@extends("auth.layout")

@section("title", __('auth.reset_password.title'))

@section("content")

    <section class="auth-form">
        <a href="{{ url('/') }}" class="auth-logo">
            <img src="{{ asset('logo.svg') }}" alt="{{ config('app.name') }} logo">
        </a>

        <div class="auth-form-inner">
            <div class="auth-title auth-title-15">
                <h1 class="title title--long">{{ __("auth.reset_password.title") }}</h1>
            </div>

            <form method="POST" action="{{ route('password.update') }}" novalidate>
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email"
                           placeholder="{{ __('auth.form.label.email') }}"
                           value="{{ old('email') }}" required>
                    <label for="email" class="form-label"> {{ __('auth.form.label.email') }}</label>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-floating  mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                           name="password"
                           autocomplete="new-password" placeholder="{{ __('auth.form.label.password_register') }}"
                           required>
                    <label for="password" class="form-label">{{ __('auth.form.label.password_register') }}</label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-floating  mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                           id="password_confirmation" name="password_confirmation"
                           placeholder="{{ __('auth.form.label.password_confirmation') }}" required>
                    <label for="password_confirmation"
                           class="form-label">{{ __('auth.form.label.password_confirmation') }}</label>
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-cta btn-lg">{{ __('auth.form.button.reset_password') }}</button>
            </form>
        </div>
    </section>
@endsection



