<footer class="bg-success text-white pt-5">
    <div class="container">
        <div class="row">

            {{-- Tentang --}}
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Pondok Pesantren </br>Ma'hadul Ilmi Wattazkiyah</h5>
                <p class="small">
                    Lembaga pendidikan Islam yang berkomitmen membentuk generasi
                    Qur'ani, berilmu, dan berakhlak mulia.
                </p>
            </div>

            {{-- Menu --}}
            <div class="col-md-4 mb-4">
                <h6 class="fw-semibold">Menu</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/') }}" class="text-white text-decoration-none">Beranda</a></li>
                    <li><a href="#profile" class="text-white text-decoration-none">Profil</a></li>
                    <li><a href="#programs" class="text-white text-decoration-none">Program</a></li>
                    <li><a href="#berita" class="text-white text-decoration-none">Berita</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div class="col-md-4 mb-4">
                <h6 class="fw-semibold">Kontak</h6>
                <p class="small mb-1">Jl. Pendidikan Islam No. 123</p>
                <p class="small mb-1">Kota Santri, Indonesia</p>
                <p class="small mb-1">Telp: (021) 12345678</p>
                <p class="small">Email: info@alhikmah.sch.id</p>
            </div>

        </div>

        <hr class="border-light">

        <div class="text-center pb-3 small">
            © {{ date('Y') }} Pondok Pesantren Ma'hadul Ilmi Wattazkiyah. All rights reserved.
        </div>
    </div>
</footer>
