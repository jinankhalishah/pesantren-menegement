<section id="news"  class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Berita</h2>
            <p class="text-muted">
                Informasi terbaru seputar kegiatan santri dan pondok pesantren
            </p>
        </div>

        <div class="row g-4">
            @forelse($beritas as $berita)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">

                        <div class="ratio ratio-16x9">
                            @if($berita->gambar)
                                <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                                    class="img-fluid rounded-top" alt="{{ $berita->judul }}" style="object-fit:cover;">
                            @else
                                <div class="d-flex justify-content-center align-items-center bg-secondary bg-opacity-25 rounded-top">
                                    <i class="bi bi-newspaper text-secondary" style="font-size:3rem;"></i>
                                </div>
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column">
                            <small class="text-muted mb-2">
                                {{ $berita->created_at->format('d M Y') }}
                            </small>
                            <h5 class="card-title">
                                {{ $berita->judul }}
                            </h5>
                            <p class="card-text text-muted">
                                {{ \Illuminate\Support\Str::limit($berita->ringkasan, 100) }}
                            </p>

                            <a href="{{ route('berita.show', $berita) }}" class="btn btn-outline-primary mt-auto">
                                Lihat Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    Belum ada berita.
                </div>
            @endforelse
        </div>
    </div>
</section>
