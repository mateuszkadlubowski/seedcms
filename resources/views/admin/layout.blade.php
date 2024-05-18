<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="theme-color" content="#ee6c4d">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    @vite(['resources/js/app.js','resources/js/admin/admin.js','resources/scss/admin/bootstrap5.scss',
    'resources/scss/admin/admin.scss'])

</head>
<body>
<div class="admin-panel">
    <header class="admin-header">
        <a href="{{ route('admin.index') }}" class="admin-logo">
            <img src="{{ asset('logo.svg') }}" alt="{{ config('app.name') }} logo">
        </a>
{{--        <div class="admin-usermenu shadow-lg">--}}
{{--            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">--}}
{{--                <img--}}
{{--                    src="{{ Auth::user()->avatar ? asset('uploads/'. Auth::user()->avatar) : asset('img/admin/user_placeholder.svg') }}"--}}
{{--                    alt="avatar">--}}
{{--                {{ Auth::user()->username }}</a>--}}
{{--            <ul class="dropdown-menu">--}}
{{--                <li><a class="dropdown-item icon-user-edit"--}}
{{--                       href="{{ route('admin.profile.edit') }}">{{ __('admin.usermenu.profile') }}</a></li>--}}
{{--                <li>--}}
{{--                    <hr class="dropdown-divider">--}}
{{--                </li>--}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li><a class="dropdown-item icon-power-off" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">{{ __('admin.usermenu.logout') }}</a>
                    </li>
                </form>
{{--            </ul>--}}
{{--        </div>--}}
    </header>


    {{--    <nav class="admin-nav" id="admin-nav">--}}
    {{--        <ul class="nav flex-column">--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link icon-admin {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"--}}
    {{--                   aria-current="page"--}}
    {{--                   href="{{ route('admin.dashboard') }}">{{ __('admin.dashboard.name') }}</a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item nav-item-dropdown">--}}
    {{--                <a class="nav-link nav-link-dropdown icon-users {{ request()->routeIs('admin.users.list') ? 'active open' : '' }}"--}}
    {{--                   href="{{ route('admin.users.list') }}">{{ __('admin.users.name') }}</a>--}}
    {{--                <ul class="sub-nav nav  flex-column">--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a class="nav-link {{ request()->routeIs('admin.users.list') ? 'active' : '' }}"--}}
    {{--                           href="{{ route('admin.users.list') }}">{{ __('admin.users.menu.list') }}</a>--}}
    {{--                    </li>--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a class="nav-link  {{ request()->routeIs('admin.users.create') ? 'active' : '' }}"--}}
    {{--                           href="{{ route('admin.users.create') }}">{{ __('admin.users.menu.create') }}</a>--}}
    {{--                    </li>--}}
    {{--                </ul>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item">--}}
    {{--                <a @class(['nav-link icon-settings', 'active' => request()->routeIs('admin.settings')])--}}
    {{--                   href="{{ route('admin.settings') }}">{{ __('admin.settings.name') }}</a>--}}
    {{--            </li>--}}

    {{--            // @menu('admin')--}}
    {{--        </ul>--}}
    {{--    </nav>--}}

    <main class="admin-main">
        {{-- <x-admin.alert />--}}
                        @if(session('warning'))
                            <div class="alert cms-alert alert-warning alert-dismissible fade show"
                                 role="alert">
                                {{ session('warning') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
        @if(session('status'))
            <div class="alert cms-alert alert-warning alert-dismissible fade show"
                 role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('success'))
            <div class="alert cms-alert alert-success alert-dismissible fade show"
                 role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
                    @if(session('error'))
                        <div class="alert cms-alert alert-danger alert-dismissible fade show"
                             role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

        {{--            <nav aria-label="breadcrumb" class="admin-breadcrumb">--}}
        {{--                <ol class="breadcrumb">--}}
        {{--                    <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
        {{--                    <li class="breadcrumb-item"><a href="#">Użytkownicy</a></li>--}}
        {{--                    <li class="breadcrumb-item active" aria-current="page">Lista użytkowników</li>--}}
        {{--                </ol>--}}
        {{--            </nav>--}}
        {{--        <div class="card admin-card-title">--}}
        {{--            <div class="card-body">--}}
        {{--                <h1 class="admin-title">@yield('title')</h1>--}}
        {{--                <a href="{{ url()->previous() }}" class="return-link icon-return" title="{{ __('admin.panel.return') }}"--}}
        {{--                   aria-label="{{ __('admin.panel.return') }}" role="button"></a>--}}
        {{--            </div>--}}
        {{--        </div>--}}



        @yield('content')
    </main>
</div>
</body>
</html>
