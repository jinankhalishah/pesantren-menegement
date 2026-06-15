<div id="sidebar" class="sidebar d-flex flex-column text-white p-3"
    style="background: linear-gradient(180deg, #0f5132, #198754); width:250px; height:100vh; position:fixed; transition: all 0.3s; overflow:hidden;">

    <!-- Header -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div id="sidebar-text">
            <h6 class="fw-semibold mb-1">Sistem Informasi</h6>
            <small class="text-white-50">Ponpes Al-Hikmah</small>
        </div>

        <button onclick="toggleSidebar()" class="btn btn-sm btn-light">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <!-- Menu -->
    <ul class="nav flex-column gap-2">

        <li>
            <a href="/dashboard"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-3
               {{ request()->is('dashboard') ? 'active bg-white text-success fw-semibold' : 'text-white' }}">
                <i class="bi bi-grid me-3 icon"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('santri.index') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-3
               {{ request()->is('santri*') ? 'active bg-white text-success fw-semibold' : 'text-white' }}">
                <i class="bi bi-people me-3 icon"></i>
                <span class="menu-text">Santri</span>
            </a>
        </li>

        <li>
            <a href="{{ route('guru.index') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-3
               {{ request()->is('guru*') ? 'active bg-white text-success fw-semibold' : 'text-white' }}">
                <i class="bi bi-mortarboard me-3 icon"></i>
                <span class="menu-text">Usatadz</span>
            </a>
        </li>

        <li>
            <a href="{{ route('mapel.index') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-3
            {{ request()->is('mapel*') ? 'active bg-white text-success fw-semibold' : 'text-white' }}">
                <i class="bi bi-book me-3 icon"></i>
                <span class="menu-text">Mata Pelajaran</span>
            </a>
        </li>

        <li>
            <a href="{{ route('kelas.index') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-3
            {{ request()->is('kelas*') ? 'active bg-white text-success fw-semibold' : 'text-white' }}">
                <i class="bi bi-building me-3 icon"></i>
                <span class="menu-text">
                    Kelas
                </span>

            </a>
        </li>

        <li>
            <a href="{{ route('jadwal.index') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-3
               {{ request()->is('jadwal*') ? 'active bg-white text-success fw-semibold' : 'text-white' }}">
                <i class="bi bi-calendar3 me-3 icon"></i>
                <span class="menu-text">Jadwal</span>
            </a>
        </li>

        <li>
            <a href="{{ route('absensi.index') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-3
               {{ request()->is('absensi*') ? 'active bg-white text-success fw-semibold' : 'text-white' }}">
                <i class="bi bi-clipboard-check me-3 icon"></i>
                <span class="menu-text">Absensi</span>
            </a>
        </li>

        <li>
            <a href="{{ route('absensi.rekap') }}"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-3
                {{ request()->routeIs('absensi.rekap') ? 'active bg-white text-success fw-semibold' : 'text-white' }}">
                <i class="bi bi-bar-chart me-3 icon"></i>
                <span class="menu-text">Rekap Absensi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link d-flex align-items-center px-3 py-2 rounded-3 text-white" data-bs-toggle="collapse"
                href="#keuanganMenu" role="button">
                <i class="bi bi-wallet2 me-3 icon"></i>
                <span class="menu-text flex-grow-1">
                    Keuangan
                </span>
                <i class="bi bi-chevron-down"></i>
            </a>

            <div class="collapse {{ request()->is('keuangan*') || request()->is('jenis-pembayaran*') ? 'show' : '' }}"
                id="keuanganMenu">
                <ul class="nav flex-column ms-4 mt-2">
                    <li class="nav-item">
                        {{-- <a href="{{ route('keuangan.dashboard') }}" class="nav-link text-white"> --}}
                        <a href="#" class="nav-link text-white"></a>
                        Dashboard Keuangan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('jenis-pembayaran.index') }}" class="nav-link text-white">
                            Jenis Pembayaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('transaksi-pembayaran.index') }}" class="nav-link text-white">
                        Transaksi Pembayaran
                        </a>
                    </li>
                    <li class="nav-item">
                        {{-- <a href="{{ route('pengeluaran.index') }}" class="nav-link text-white"> --}}
                        <a href="#" class="nav-link text-white"></a>
                        Pengeluaran
                        </a>
                    </li>
                    <li class="nav-item">
                        {{-- <a href="{{ route('keuangan.rekap') }}" class="nav-link text-white"> --}}
                        <a href="#" class="nav-link text-white"></a>
                        Rekap Keuangan
                        </a>
                    </li>

                </ul>

            </div>

        </li>

        <li>
            <a href="/logout"
                class="nav-link d-flex align-items-center px-3 py-2 rounded-3
               {{ request()->is('logout*') ? 'active bg-white text-success fw-semibold' : 'text-white' }}">
                <i class="bi bi-box-arrow-right me-3 icon"></i>
                <span class="menu-text">Logout</span>
            </a>
        </li>

    </ul>

    <div class="mt-auto"></div>

    <!-- User -->
    <div class="pt-3 border-top border-light border-opacity-25 d-flex align-items-center">
        <div class="bg-white text-success rounded-circle d-flex justify-content-center align-items-center me-2"
            style="width:35px;height:35px;">
            <i class="bi bi-person"></i>
        </div>
        <div class="menu-text">
            <div class="fw-semibold">Admin</div>
            <small class="text-white-50">Administrator</small>
        </div>
    </div>

</div>
