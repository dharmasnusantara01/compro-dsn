<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.seo-meta')

    {{--
        Font strategy:
        - Plus Jakarta Sans  → Display / headlines  (Tokotype, Indonesian foundry)
        - DM Sans            → Body / UI copy        (Colophon Foundry, used by Figma)
        - Syne               → Numerals / stats      (distinctive character at large sizes)
        All loaded from Bunny Fonts (GDPR-compliant Google Fonts alternative)
    --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|dm-sans:400,500|syne:700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="antialiased">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
