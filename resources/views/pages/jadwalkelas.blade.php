@extends('layout.appadmin')

@section('content')

    @php
        use Carbon\Carbon;

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        // ambil slot waktu unik
        $timeSlots = $jadwals
            ->sortBy('jam_mulai')
            ->map(function ($item) {
                return $item->jam_mulai . '-' . $item->jam_selesai;
            })
            ->unique()
            ->values();

        // INDEXING JADWAL BIAR CEPAT (ANTI LAG)
        $jadwalMap = [];

        foreach ($jadwals as $item) {
            $key = $item->hari . '|' . $item->jam_mulai . '|' . $item->jam_selesai;
            $jadwalMap[$key] = $item;
        }
    @endphp

    <!-- HEADER -->
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Jadwal Pelajaran</h3>
        <p class="text-muted mb-0">
            Kelas {{ $kelas->tingkat }} {{ $kelas->nama_kelas }}
        </p>
    </div>

    <!-- ACTION -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('kelas.index') }}" class="btn btn-outline-secondary rounded-circle">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div class="ms-auto d-flex gap-2">
            <a href="{{ route('kelas.jadwal.pdf', $kelas->id) }}" target="_blank" class="btn btn-danger rounded-3">
                <i class="bi bi-file-earmark-pdf me-1"></i> PDF </a>
            <a href="{{ route('jadwal.index') }}" class="btn btn-success rounded-3">
                <i class="bi bi-calendar-week me-1">
                </i> Kelola Jadwal </a>
        </div>
    </div>

    <!-- CARD INFO -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <small class="text-muted">Kelas</small>
                    <h4 class="fw-bold mb-0">
                        {{ $kelas->tingkat }} {{ $kelas->nama_kelas }}
                    </h4>
                </div>

                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <small class="text-muted">Total Jadwal</small>
                    <h4 class="fw-bold text-success mb-0">
                        {{ $jadwals->count() }}
                    </h4>
                </div>

            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-success text-white py-3">
            <h5 class="mb-0 fw-semibold">Jadwal Mingguan</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-bordered align-middle text-center mb-0">

                    <thead>
                        <tr class="table-success">
                            <th width="120">Waktu</th>
                            @foreach ($days as $day)
                                <th>{{ $day }}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($timeSlots as $slot)
                            @php
                                [$start, $end] = explode('-', $slot);
                            @endphp

                            <tr>

                                <!-- WAKTU -->
                                <td class="bg-light fw-bold">
                                    {{ Carbon::parse($start)->format('H:i') }}
                                    <br>
                                    <small class="text-muted">s/d</small>
                                    <br>
                                    {{ Carbon::parse($end)->format('H:i') }}
                                </td>

                                <!-- HARI -->
                                @foreach ($days as $day)
                                    @php
                                        $key = $day . '|' . $start . '|' . $end;
                                        $jadwal = $jadwalMap[$key] ?? null;
                                    @endphp

                                    <td style="height: 95px; vertical-align: middle;">

                                        @if ($jadwal)
                                            <div class="px-2">
                                                <div class="fw-bold text-success">
                                                    {{ $jadwal->mapel?->nama_mapel ?? '-' }}
                                                </div>

                                                <small class="text-muted d-block mt-1">
                                                    <i class="bi bi-person-fill me-1"></i>
                                                    {{ $jadwal->guru?->name ?? '-' }}
                                                </small>
                                            </div>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif

                                    </td>
                                @endforeach

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="py-5 text-center text-muted">
                                    <i class="bi bi-calendar-x fs-2 d-block mb-2"></i>
                                    Belum ada jadwal untuk kelas ini
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection
