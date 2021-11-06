<nav class="navbar-primary" x-data="{ open: false }" x-bind:class="! open ? '' : 'expanded'">
    <div class="container">
        <div class="navbar-left">
            <a class="navbar-logo" href="{{ route('home') }}">
                <img src="/images/logo.png" alt="Logo Masjid Sabilal Muhtadin">
            </a>
        </div>
        <a class="d-block d-lg-none btn btn-cart cart-1 ml-auto" href="{{ route('shop.cart') }}">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 24px; width: 24px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13 5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-8 2a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/></svg>
            <span class="badge badge-danger">0</span>
        </a>
        <div class="navbar-nav">
            <a class="menu-toggle" x-on:click="open = ! open">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" style="height: 24px; width: 24px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" style="height: 24px; width: 24px; display: none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/></svg>
            </a>
            <ul>
                <li><a class="nav-link {{ (request()->is('profil')) ? 'active' : '' }}" href="{{ route('profile') }}">Profil</a></li>
                <li><a class="nav-link {{ (request()->is('agenda')) ? 'active' : '' }}" href="{{ route('event.index') }}">Agenda</a></li>
                <li><a class="nav-link {{ (request()->is('booking*')) ? 'active' : '' }}" href="{{ route('spot.index') }}">Booking</a></li>
                <li><a class="nav-link {{ (request()->is('vendor-pernikahan*')) ? 'active' : '' }}" href="{{ route('vendors.index') }}">Vendor</a></li>
                <li><a class="nav-link {{ (request()->is('laporan-keuangan*')) ? 'active' : '' }}" href="{{ route('statement.index') }}">Laporan</a></li>
                <li><a class="nav-link {{ (request()->is('berita*')) ? 'active' : '' }}" href="{{ route('post.index') }}">Berita</a></li>
                <li><a class="nav-link {{ (request()->is('produk*')) ? 'active' : '' }}" href="{{ route('product.index') }}">Belanja</a></li>
                <li class="d-none d-lg-block">
                    <a class="nav-link btn btn-cart cart-2" href="{{ route('shop.cart') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" style="height: 24px; width: 24px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13 5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-8 2a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/></svg>
                        <span class="badge badge-danger">0</span>
                    </a>
                </li>
                @guest
                <li><a class="nav-link btn btn-primary text-white mt-3 mt-lg-0 mx-3 mr-lg-0 px-lg-4 rounded-pill" href="{{ route('login') }}">Login</a></li>
                @endguest
                @auth
                    @if (auth()->user()->is_admin == 1)
                    <li><a class="nav-link btn btn-primary text-white mt-3 mt-lg-0 mx-3 mr-lg-0 px-lg-4 rounded-pill" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    @else
                    <li><a class="nav-link btn btn-primary text-white mt-3 mt-lg-0 mx-3 mr-lg-0 px-lg-4 rounded-pill" href="{{ route('member.bookings.list') }}">Dashboard</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>