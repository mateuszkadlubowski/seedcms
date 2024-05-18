@extends("auth.layout")

@section("title", __('auth.forgot_password.title'))

@section("content")
    <section class="auth-form">
        <a href="{{ url('/') }}" class="auth-logo">
            <img src="{{ asset('logo.svg') }}" alt="{{ config('app.name') }} logo">
        </a>
        <div class="auth-form-inner">
            <div class="auth-title">
                <h1 class="title title--long">{{ __("auth.forgot_password.title") }}</h1>
            </div>
            @if (session('status'))
                <div class="alert alert-success cms-alert mt-5" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.request') }}" novalidate>
                <p>{{ __('auth.forgot_password.tip') }}</p>
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email"
                           placeholder="{{ __('auth.form.label.email') }}"
                           value="{{ old('email') }}" required>
                    <label for="email" class="form-label"> {{ __('auth.form.label.email') }}</label>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-cta btn-lg">{{ __('auth.form.button.forgot_password') }}</button>
            </form>
        </div>
    </section>
@endsection











