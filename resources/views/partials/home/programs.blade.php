<section id="programs"  class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Program Unggulan</h2>
            <p class="text-muted">
                Program pendidikan terbaik untuk pengembangan santri
            </p>
        </div>

        <div class="row g-4">
            @foreach ($programs as $p)
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-semibold mb-1">
                                    {{ $p['name'] }}
                                </h5>
                                <small class="text-muted">
                                    {{ $p['level'] }}
                                </small>
                            </div>

                            <span class="badge bg-success bg-opacity-10 text-success p-3 rounded-circle">
                                <i class="bi bi-book fs-5"></i>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
