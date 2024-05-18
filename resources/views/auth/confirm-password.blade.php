@extends("auth.layout")

@section("title", __('auth.confirm_password.title'))

@section("content")
    <section class="auth-form">
        <a href="{{ url('/') }}" class="auth-logo">
            <img src="{{ asset('logo.svg') }}" alt="{{ config('app.name') }} logo">
        </a>
        <div class="auth-form-inner">
            <div class="auth-title auth-title-15">
                <h1 class="title">{{ __("auth.confirm_password.title") }}</h1>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" novalidate>
                <p> {{ __("auth.confirm_password.tip") }}</p>
                @csrf
                <div class="form-floating  mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                           name="password"
                           autocomplete="password" placeholder="{{ __('auth.label.password') }}"
                           required>
                    <label for="password" class="form-label">{{ __('auth.form.label.password') }}</label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-cta btn-lg">{{ __('auth.form.button.confirm_password') }}</button>
            </form>
        </div>
    </section>
@endsection

