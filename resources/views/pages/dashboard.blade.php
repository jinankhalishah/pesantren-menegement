@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Dashboard</h3>
        <p class="text-muted mb-0">
            Selamat datang di Sistem Informasi Pondok Pesantren Ma'hadul Ilmi Wattazkiyah
        </p>
    </div>

    <!-- CARD STATS -->
    <div class="row g-4 mb-4">

        <!-- Santri -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Total Santri</small>
                        <h3 class="fw-semibold mb-0">{{ $totalSantri }}</h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ustadz -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Total Ustadz</small>
                        <h3 class="fw-semibold mb-0">{{ $totalGuru }}</h3>
                    </div>
                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-3">
                        <i class="bi bi-mortarboard fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mapel -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Mata Pelajaran</small>
                        <h3 class="fw-semibold mb-0">{{ $totalMapel }}</h3>
                    </div>
                    <div class="bg-purple bg-opacity-10 text-purple p-3 rounded-3"
                        style="background-color:#6f42c1; color:white;">
                        <i class="bi bi-book fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kehadiran -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted d-block">
                            Kehadiran Hari Ini
                        </small>

                        <div class="d-flex align-items-end gap-2">

                            <h3 class="fw-semibold mb-0">
                                {{ $persentaseKehadiran }}%
                            </h3>

                            <small class="text-success mb-1">

                                {{ $totalHadirHariIni }} dari {{ $totalAbsenHariIni }} santri

                            </small>

                        </div>

                    </div>
                    <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3">
                        <i class="bi bi-graph-up fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- CONTENT -->
    <div class="row g-4">

        <!-- Aktivitas -->
        <div class="col-lg-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <h5 class="mb-4">
                        Aktivitas Terbaru
                    </h5>

                    @forelse($aktivitasTerbaru as $item)
                        <div class="d-flex align-items-start mb-3">

                            <span class="bg-{{ $item['icon'] }}
                        rounded-circle me-3 mt-2"
                                style="width:8px;height:8px;">
                            </span>

                            <div>

                                <div class="fw-semibold">

                                    {{ $item['judul'] }}

                                </div>

                                <small class="text-muted">

                                    {{ $item['keterangan'] }}
                                    •

                                    {{ \Carbon\Carbon::parse($item['waktu'])->diffForHumans() }}

                                </small>

                            </div>

                        </div>

                        @if (!$loop->last)
                            <hr>
                        @endif

                    @empty

                        <p class="text-muted">
                            Belum ada aktivitas
                        </p>
                    @endforelse

                </div>

            </div>

        </div>

        <!-- Jadwal -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <h5 class="mb-3">Jadwal Mendatang</h5>

                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-success bg-opacity-10 text-success me-3 px-3 py-2">
                        15 Des 2025
                    </span>
                    <div>Ujian Akhir Semester</div>
                </div>

                <hr>

                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-success bg-opacity-10 text-success me-3 px-3 py-2">
                        20 Des 2025
                    </span>
                    <div>Wisuda Santri</div>
                </div>

                <hr>

                <div class="d-flex align-items-center">
                    <span class="badge bg-success bg-opacity-10 text-success me-3 px-3 py-2">
                        5 Jan 2026
                    </span>
                    <div>Tahun Ajaran Baru</div>
                </div>

            </div>
        </div>

    </div>
@endsection
