@extends("auth.layout")

@section("title", __('auth.register.title'))

@section("content")
    <section class="auth-panel">
        <a href="{{ url('/') }}" class="auth-logo">
            <img src="{{ asset('logo.svg') }}" alt="{{ config('app.name') }} logo">
        </a>
        <div class="auth-panel-inner">
            <div class="auth-title">
                <h1 class="title  title--long">{{ __("auth.register.title") }}</h1>
                <small>{{ __("auth.register.smalltext") }}</small>
            </div>

            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" autocomplete="name"
                           placeholder="{{ __('auth.form.label.username') }}"
                           value="{{ old('username') }}" required>
                    <label for="username" class="form-label"> {{ __('auth.form.label.username') }}</label>
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email" autocomplete="email"
                           placeholder="{{ __('auth.form.label.email') }}"
                           value="{{ old('email') }}" required>
                    <label for="email" class="form-label"> {{ __('auth.form.label.email') }}</label>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-floating  mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                           name="password"
                           autocomplete="new-password" placeholder="{{ __('auth.form.label.password_register') }}" required>
                    <label for="password" class="form-label">{{ __('auth.form.label.password_register') }}</label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-floating  mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                           id="password_confirmation" name="password_confirmation"
                           placeholder="{{ __('auth.form.label.password_confirmation') }}" required>
                    <label for="password_confirmation" class="form-label">{{ __('auth.form.label.password_confirmation') }}</label>
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-btns-wrap">
                    <button type="submit" class="btn btn-cta">{{ __('auth.form.button.register') }}</button>
                    <a class="auth-link" href="{{ route('login') }}">
                        {{ __('auth.form.link.to_login') }}
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection
