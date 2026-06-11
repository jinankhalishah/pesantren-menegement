<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Fasilitas Pesantren</h2>
            <p class="text-muted">Fasilitas lengkap untuk santri</p>
        </div>

        <div class="row g-4">
            @foreach ($facilities as $facility)
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body py-5">
                            <i class="bi {{ $facility['icon'] }} fs-2 text-success"></i>
                            <h5 class="mt-3">{{ $facility['title'] }}</h5>
                            <p class="text-muted small">{{ $facility['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
