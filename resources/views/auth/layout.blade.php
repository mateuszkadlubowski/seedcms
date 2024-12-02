<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--    @todo Favicon --}}
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <meta name="theme-color" content="#ee6c4d">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&display=swap"
          rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/scss/admin/bootstrap5.scss', 'resources/scss/admin/auth.scss'])
</head>
<body>
<main class="auth-page">
    @yield('content')
</main>
<script>
    document.querySelector('form').addEventListener('submit', (e) => {
        document.querySelector('form .btn-cta').classList.add('animate-spin');
    });
</script>
</body>
</html>
