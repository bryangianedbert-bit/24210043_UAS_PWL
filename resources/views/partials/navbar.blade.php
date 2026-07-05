<nav class="top-navbar">

    <div class="d-flex align-items-center">

        <button class="btn navbar-menu-btn d-lg-none me-3" id="openSidebar">
            <i class="bi bi-list"></i>
        </button>

        <div>

            <h5 class="navbar-title mb-0">
                @yield('title', 'Dashboard')
            </h5>

            <small class="navbar-subtitle d-none d-md-block">
                Sistem Informasi Akademik
            </small>

        </div>

    </div>

    <div class="d-flex align-items-center">

        <div class="navbar-user me-3 d-none d-sm-block">

            <strong>
                {{ Auth::user()->name ?? 'Administrator' }}
            </strong>

            <small>
                Administrator
            </small>

        </div>

        <div class="navbar-avatar">

            {{ strtoupper(substr(Auth::user()->name ?? 'A',0,1)) }}

        </div>

        <form action="{{ route('logout') }}" method="POST" class="ms-3">
            @csrf

            <button class="btn navbar-logout">

                <i class="bi bi-box-arrow-right"></i>

            </button>

        </form>

    </div>

</nav>