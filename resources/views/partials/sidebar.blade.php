<div class="sidebar shadow" id="sidebar">

    <div class="sidebar-header">

        <div class="text-center">

            <div class="sidebar-logo mb-2">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <h4 class="sidebar-title mb-0">
                SIAKAD
            </h4>

            <small class="sidebar-subtitle">
                Sistem Informasi Akademik
            </small>

        </div>

        <button class="btn btn-sm text-white d-lg-none position-absolute end-0 top-0 m-3" id="closeSidebar">
            <i class="bi bi-x-lg"></i>
        </button>

    </div>

    <div class="sidebar-menu">

        <div class="menu-label">
            Menu Utama
        </div>

        <a href="{{ route('dashboard') }}"
            class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-fill"></i>

            Dashboard

        </a>

        <div class="menu-label mt-4">

            Master Data

        </div>

        <a href="{{ route('jurusan.index') }}"
            class="sidebar-link {{ request()->routeIs('jurusan.*') ? 'active' : '' }}">

            <i class="bi bi-building"></i>

            Jurusan

        </a>

        <a href="{{ route('dosen.index') }}"
            class="sidebar-link {{ request()->routeIs('dosen.*') ? 'active' : '' }}">

            <i class="bi bi-person-workspace"></i>

            Dosen

        </a>

        <a href="{{ route('mahasiswa.index') }}"
            class="sidebar-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">

            <i class="bi bi-people-fill"></i>

            Mahasiswa

        </a>

        <a href="{{ route('mata_kuliah.index') }}"
            class="sidebar-link {{ request()->routeIs('mata_kuliah.*') ? 'active' : '' }}">

            <i class="bi bi-book-half"></i>

            Mata Kuliah

        </a>

        <a href="{{ route('kelas.index') }}"
            class="sidebar-link {{ request()->routeIs('kelas.*') ? 'active' : '' }}">

            <i class="bi bi-door-open-fill"></i>

            Kelas

        </a>

        <div class="menu-label mt-4">

            Transaksi

        </div>

        <a href="{{ route('krs.index') }}"
            class="sidebar-link {{ request()->routeIs('krs.*') || request()->routeIs('detail_krs.*') ? 'active' : '' }}">

            <i class="bi bi-file-earmark-text-fill"></i>

            Kartu Rencana Studi

        </a>

    </div>

    <div class="sidebar-footer">

        <div class="user-box">

            <div class="user-avatar">

                {{ strtoupper(substr(Auth::user()->name ?? 'A',0,1)) }}

            </div>

            <div>

                <strong>{{ Auth::user()->name ?? 'Administrator' }}</strong>

                <br>

                <small>Administrator</small>

            </div>

        </div>

    </div>

</div>