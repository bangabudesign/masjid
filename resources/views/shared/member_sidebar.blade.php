<nav class="sidebar">
    <div class="sidebar-nav">
        <ul>
            <li>
                <a class="nav-link {{ (request()->is('member/bookings*')) ? 'active' : '' }}" href="{{ route('member.bookings.list') }}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path d="M9 2a1 1 0 0 0 0 2h2a1 1 0 1 0 0-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 0 1 2-2 3 3 0 0 0 3 3h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5zm3 4a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2H7zm3 0a1 1 0 0 0 0 2h3a1 1 0 1 0 0-2h-3zm-3 4a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H7zm3 0a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3z" clip-rule="evenodd"/></svg>
                    </div>
                    <nav>Booking</nav>
                </a>
            </li>
        </ul>
    </div>
</nav>