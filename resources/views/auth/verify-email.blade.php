@extends("auth.layout")

@section("title", __('auth.verify_email.title'))

@section("content")
    <section class="auth-form">
        <a href="{{ url('/') }}" class="auth-logo">
            <img src="{{ asset('logo.svg') }}" alt="{{ config('app.name') }} logo">
        </a>
        <div class="auth-form-inner">
            <div class="auth-title">
                <h1 class="title">{{ __("auth.verify_email.title") }}</h1>
            </div>
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success cms-alert mt-5" role="alert">
                    {{ __('auth.verify_email.sendmsg') }}
                </div>
            @endif
            <form method="POST" action="{{ route('verification.send') }}" novalidate>
                <p>{{ __('auth.verify_email.tip') }}</p>
                @csrf
                <div class="form-btns-wrap">
                    <button type="submit" class="btn btn-cta">{{ __('auth.form.button.resend_email') }}</button>
                </div>
            </form>
        </div>
    </section>
@endsection

