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
    <link href="{{ asset('css/admin.css?=').now() }}" rel="stylesheet">
    @stack('styles')
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- @include('shared.header_scripts') --}}
    
</head>
<body>
    <main class="admin-panel" x-data="{ open: false }">
        <div class="topbar">            
            <div class="topbar-brand">
                <a class="topbar-logo" href="/">
                    <img src="/images/logo.png" alt="Logo Masjid Sabilal Muhtadin">
                </a>
            </div>
            <div class="topbar-right">
                <div class="notif">
                    <a href="" class="bg-white icon">
                        <span class="badge badge-pill badge-primary">0</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path d="M9 2a1 1 0 0 0 0 2h2a1 1 0 1 0 0-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 0 1 2-2 3 3 0 0 0 3 3h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5zm3 4a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2H7zm3 0a1 1 0 0 0 0 2h3a1 1 0 1 0 0-2h-3zm-3 4a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H7zm3 0a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3z" clip-rule="evenodd"/></svg>
                    </a>
                </div>
                <div class="d-md-flex align-items-center d-none ml-auto">
                    <div class="text-right mr-3">
                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        <div class="text-muted">{{ auth()->user()->email }}</div>
                    </div>
                    <div class="avatar">
                        <img src="https://picsum.photos/id/1/300/250" alt="avatar">
                    </div>
                </div>
                <a class="menu-toggle d-md-none ml-auto" x-on:click="open = ! open">
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" style="height: 24px; width: 24px; display: none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/></svg>
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" style="height: 24px; width: 24px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </a>
            </div>
        </div>
        <div class="panel-layout" x-bind:class="! open ? '' : 'expanded'">
            @include('shared.member_sidebar')
            <section class="content">
                @yield('content')
            </section>
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>