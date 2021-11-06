<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="title" content="{{ config('app.name', 'Laravel') }}">
    <meta name="description" content="{{ config('app.description', 'Laravel') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
    <meta property="og:description" content="{{ config('app.description', 'Laravel') }}">
    <meta property="og:image" content="{{ url()->current() }}">

    <!-- Scripts -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
 
    <!-- Styles -->
    <link href="{{ asset('css/app.css?=').now() }}" rel="stylesheet">
    @stack('styles')
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- @include('shared.header_scripts') --}}
    
</head>
<body>
    <div class="state-header">
        <div class="container d-flex" style="height: 100%">
            <a class="state-logo mt-auto mx-auto" href="/">
                <img src="/images/logo.png" alt="Logo Masjid Sabilal Muhtadin">
            </a>
        </div>
    </div>
    @yield('content')
    @include('shared.footer')
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>