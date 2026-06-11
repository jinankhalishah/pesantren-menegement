<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Prestasi</h2>
            <p class="text-muted">Prestasi yang telah diraih santri kami</p>
        </div>

        <div class="row g-4">
            @foreach ($achievements as $a)
                <div class="col-md-4">
                    <div class="p-4 bg-success text-white rounded shadow">
                        <span class="badge bg-light text-success mb-3">
                            {{ $a['year'] }}
                        </span>
                        <p class="mb-0">{{ $a['title'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
