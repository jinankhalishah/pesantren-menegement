<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            Pondok Pesantren Al-Hikmah
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profile">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#programs">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#news">Berita</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-light text-success fw-semibold" href="{{ url('/login') }}">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Spacer agar konten tidak tertutup navbar --}}
<div style="height: 80px"></div>
