<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Prestasi</h2>
            <p class="text-muted">
                Prestasi yang telah diraih santri kami
            </p>
        </div>

        <div class="row g-4">

            @forelse($prestasis as $prestasi)

                <div class="col-md-4">

                    <div class="p-4 bg-success text-white rounded-4 shadow-sm h-60">

                        <span class="badge bg-light text-success mb-3">

                            {{ $prestasi->tahun }}

                        </span>

                        <h6 class="fw-semibold">

                            {{ $prestasi->judul }}

                        </h6>

                        <small>

                            {{ $prestasi->tingkat }}

                        </small>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <p class="text-muted">
                        Belum ada data prestasi
                    </p>

                </div>

            @endforelse

        </div>

    </div>
</section>
