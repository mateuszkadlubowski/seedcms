@extends("auth.layout")

@section("title", __('auth.login.title'))
@section("content")
    <section class="auth-panel auth-panel--login">
        <a href="{{ url('/') }}" class="auth-logo">
            <img src="{{ asset('logo.svg') }}" alt="{{ config('app.name') }} logo">
        </a>
        <div class="auth-panel-inner">
            <div class="auth-title">
                <h1 class="title">{{ __("auth.login.title") }}</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger cms-alert mt-5" role="alert">
                    {{ __('auth.failed') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success cms-alert mt-5" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text icon-person" id="email-addon"></span>
                    <input type="text" name="username" id="username" class="form-control" autofocus
                           placeholder="{{ __('auth.form.label.login_or_email') }}"
                           aria-label="{{ __('auth.form.label.login_or_email') }}" aria-describedby="email-addon"
                           required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text icon-lock" id="pass-addon"></span>
                    <input type="password" class="form-control" id="password" name="password"
                           autocomplete="current-password" placeholder="{{ __('auth.form.label.password') }}"
                           aria-label="{{ __('auth.form.label.password') }}" aria-describedby="pass-addon"
                           required>
                </div>
                <div class="form-btns-wrap mt-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">{{ __('auth.login.remember_me') }}</label>
                    </div>
                    <button type="submit" class="btn btn-cta">{{ __('auth.form.button.login') }}</button>
                </div>
            </form>
        </div>
        <div class="auth-form-links">
            @if (config('admin.register_users'))
                <a class="auth-link" href="{{ route('register') }}">
                    {{ __('auth.form.link.to_register') }}
                </a>
            @endif
            <a class="auth-link" href="{{ route('password.request') }}">
                {{ __('auth.form.link.to_forgot_password') }}
            </a>
        </div>
    </section>
@endsection
