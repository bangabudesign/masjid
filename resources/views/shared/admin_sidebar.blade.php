<nav class="sidebar">
    <div class="sidebar-nav">
        <ul>
            <li>
                <a class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 0 0-1.414 0l-7 7a1 1 0 0 0 1.414 1.414L4 10.414V17a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-6.586l.293.293a1 1 0 0 0 1.414-1.414l-7-7z"/></svg>
                    </div>
                    <nav>Dashboard</nav>
                </a>
            </li>
            <li>
                <a class="nav-link {{ (request()->is('admin/products*')) ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 2a4 4 0 0 0-4 4v1H5a1 1 0 0 0-.994.89l-1 9A1 1 0 0 0 4 18h12a1 1 0 0 0 .994-1.11l-1-9A1 1 0 0 0 15 7h-1V6a4 4 0 0 0-4-4zm2 5V6a2 2 0 1 0-4 0v1h4zm-6 3a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm7-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" clip-rule="evenodd"/></svg>
                    </div>
                    <nav>Products</nav>
                </a>
            </li>
            <li>
                <a class="nav-link {{ (request()->is('admin/vendors*')) ? 'active' : '' }}" href="{{ route('admin.vendors.index') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6 6V5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2a2 2 0 0 1 2 2v3.57A22.952 22.952 0 0 1 10 13a22.95 22.95 0 0 1-8-1.43V8a2 2 0 0 1 2-2h2zm2-1a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1H8V5zm1 5a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H10a1 1 0 0 1-1-1z" clip-rule="evenodd"/><path d="M2 13.692V16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2.308A24.974 24.974 0 0 1 10 15a24.98 24.98 0 0 1-8-1.308z"/></svg>
                    </div>
                    <nav>Vendors</nav>
                </a>
            </li>
            <li>
                <a class="nav-link {{ (request()->is('admin/spots*')) ? 'active' : '' }}" href="{{ route('admin.spots.index') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path d="M2 6a2 2 0 0 1 2-2h5l2 2h5a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6z"/></svg>
                    </div>
                    <nav>Spots</nav>
                </a>
            </li>
            <li>
                <a class="nav-link {{ (request()->is('admin/bookings*')) ? 'active' : '' }}" href="{{ route('admin.bookings.index') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path d="M9 2a1 1 0 0 0 0 2h2a1 1 0 1 0 0-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 0 1 2-2 3 3 0 0 0 3 3h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5zm3 4a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2H7zm3 0a1 1 0 0 0 0 2h3a1 1 0 1 0 0-2h-3zm-3 4a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H7zm3 0a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3z" clip-rule="evenodd"/></svg>
                    </div>
                    <nav>Bookings</nav>
                </a>
            </li>
            <li>
                <a class="nav-link {{ (request()->is('admin/events*')) ? 'active' : '' }}" href="{{ route('admin.events.index') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6 2a1 1 0 0 0-1 1v1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1V3a1 1 0 1 0-2 0v1H7V3a1 1 0 0 0-1-1zm0 5a1 1 0 0 0 0 2h8a1 1 0 1 0 0-2H6z" clip-rule="evenodd"/></svg>
                    </div>
                    <nav>Agenda</nav>
                </a>
            </li>
            <li>
                <a class="nav-link {{ (request()->is('admin/statements*')) ? 'active' : '' }}" href="{{ route('admin.statements.index') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 3a1 1 0 0 0 0 2v8a2 2 0 0 0 2 2h2.586l-1.293 1.293a1 1 0 1 0 1.414 1.414L10 15.414l2.293 2.293a1 1 0 0 0 1.414-1.414L12.414 15H15a2 2 0 0 0 2-2V5a1 1 0 1 0 0-2H3zm11 4a1 1 0 1 0-2 0v4a1 1 0 1 0 2 0V7zm-3 1a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0V8zM8 9a1 1 0 0 0-2 0v2a1 1 0 1 0 2 0V9z" clip-rule="evenodd"/></svg>
                    </div>
                    <nav>Laporan</nav>
                </a>
            </li>
            <li>
                <a class="nav-link {{ (request()->is('admin/infaq*')) ? 'active' : '' }}" href="{{ route('admin.infaq.index') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 0 1 5.656 0L10 6.343l1.172-1.171a4 4 0 1 1 5.656 5.656L10 17.657l-6.828-6.829a4 4 0 0 1 0-5.656z" clip-rule="evenodd"/></svg>
                    </div>
                    <nav>Infaq</nav>
                </a>
            </li>
            <li>
                <a class="nav-link {{ (request()->is('admin/posts*')) ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">
                    <div class="icon">
                       <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2 5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v10a2 2 0 0 0 2 2H4a2 2 0 0 1-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/><path d="M15 7h1a2 2 0 0 1 2 2v5.5a1.5 1.5 0 0 1-3 0V7z"/></svg>
                    </div>
                    <nav>Berita</nav>
                </a>
            </li>
            <li>
                <a class="nav-link {{ (request()->is('admin/banks*')) ? 'active' : '' }}" href="{{ route('admin.banks.index') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path d="M4 4a2 2 0 0 0-2 2v1h16V6a2 2 0 0 0-2-2H4z"/><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9zM4 13a1 1 0 0 1 1-1h1a1 1 0 1 1 0 2H5a1 1 0 0 1-1-1zm5-1a1 1 0 1 0 0 2h1a1 1 0 1 0 0-2H9z" clip-rule="evenodd"/></svg>
                    </div>
                    <nav>Akun Bank</nav>
                </a>
            </li>
            <li>
                <a class="nav-link {{ (request()->is('admin/banners*')) ? 'active' : '' }}" href="{{ route('admin.banners.index') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 3a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
                    </div>
                    <nav>Banners</nav>
                </a>
            </li>
            <a class="nav-link {{ (request()->is('admin/teams')) ? 'active' : '' }}" href="{{ route('admin.teams.index') }}">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm5 2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-4 7a4 4 0 0 0-8 0v3h8v-3zM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm10 10v-3a5.972 5.972 0 0 0-.75-2.906A3.005 3.005 0 0 1 19 15v3h-3zM4.75 12.094A5.973 5.973 0 0 0 4 15v3H1v-3a3 3 0 0 1 3.75-2.906z"/></svg>
                </div>
                <nav>Personalia</nav>
            </a>
            <li>
                <a class="nav-link {{ (request()->is('admin/supports*')) ? 'active' : '' }}" href="{{ route('admin.supports.index') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 0 0 .078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913 1.58 1.58A5.98 5.98 0 0 1 10 16a5.976 5.976 0 0 1-2.516-.552l1.562-1.562a4.006 4.006 0 0 0 1.789.027zm-4.677-2.796a4.002 4.002 0 0 1-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 0 0 4 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0 1 10 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 0 0-2.346.033L7.246 4.668zM12 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" clip-rule="evenodd"/></svg>
                    </div>
                    <nav>Support</nav>
                </a>
            </li>
            {{-- <li>
                <a class="nav-link {{ (request()->is('admin/berita')) ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm5 2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-4 7a4 4 0 0 0-8 0v3h8v-3zM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm10 10v-3a5.972 5.972 0 0 0-.75-2.906A3.005 3.005 0 0 1 19 15v3h-3zM4.75 12.094A5.973 5.973 0 0 0 4 15v3H1v-3a3 3 0 0 1 3.75-2.906z"/></svg>
                    </div>
                    <nav>Users</nav>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>