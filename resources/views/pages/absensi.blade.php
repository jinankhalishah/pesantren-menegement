@extends('layout.appadmin')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>

        </div>
    @endif

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Absensi Santri</h3>
        <p class="text-muted mb-0">
            Kelola absensi harian santri
        </p>
    </div>

    <!-- FILTER -->

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form method="GET" action="{{ route('absensi.index') }}">

                <div class="row g-3 align-items-end">

                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Tanggal
                        </label>

                        <input type="date" name="tanggal" value="{{ request('tanggal', date('Y-m-d')) }}"
                            class="form-control rounded-3">

                    </div>

                    <div class="col-md-4">

                        <label class="form-label fw-semibold">
                            Kelas
                        </label>

                        <select name="kelas_id" class="form-select rounded-3">

                            <option value="">
                                -- Pilih Kelas --
                            </option>

                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}"
                                    {{ request('kelas_id') == $item->id ? 'selected' : '' }}>

                                    {{ $item->tingkat }}
                                    {{ $item->nama_kelas }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-4">

                        <button type="submit" class="btn btn-success rounded-3 px-4">

                            <i class="bi bi-search me-1"></i>
                            Tampilkan

                        </button>

                        @if (request('kelas_id'))
                            <a href="{{ route('absensi.pdf', [
                                'kelas_id' => request('kelas_id'),
                                'tanggal' => request('tanggal'),
                            ]) }}"
                                target="_blank" class="btn btn-danger rounded-3">
                                <i class="bi bi-file-earmark-pdf"></i>
                                PDF
                            </a>
                        @endif

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- CARD REKAP -->

    <div class="row mb-4">

        <div class="col-md">

            <div class="card bg-success text-white border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <h6>Hadir</h6>

                    <h2 class="fw-bold mb-0">
                        {{ $hadir }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md">

            <div class="card bg-warning text-white border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <h6>Sakit</h6>

                    <h2 class="fw-bold mb-0">
                        {{ $sakit }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md">

            <div class="card bg-primary text-white border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <h6>Izin</h6>

                    <h2 class="fw-bold mb-0">
                        {{ $izin }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md">

            <div class="card bg-danger text-white border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <h6>Alpha</h6>

                    <h2 class="fw-bold mb-0">
                        {{ $alpha }}
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md">

            <div class="card bg-dark text-white border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <h6>Total</h6>

                    <h2 class="fw-bold mb-0">

                        {{ $santris->count() }}

                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- TABEL ABSENSI -->

    @if (request('kelas_id'))
        <form action="{{ route('absensi.store') }}" method="POST">

            @csrf

            <input type="hidden" name="tanggal" value="{{ request('tanggal', date('Y-m-d')) }}">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-success text-white">

                    <h5 class="mb-0">
                        Data Absensi
                    </h5>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">

                                <tr>

                                    <th width="120">
                                        NIS
                                    </th>

                                    <th>
                                        Nama Santri
                                    </th>

                                    <th width="220">
                                        Status
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($santris as $santri)
                                    <tr>

                                        <td>

                                            {{ $santri->nis }}

                                        </td>

                                        <td>

                                            {{ $santri->name }}

                                        </td>

                                        <td>

                                            <input type="hidden" name="santri_id[]" value="{{ $santri->id }}">

                                            @php
                                                $status = $absensiData[$santri->id] ?? 'Belum Absen';
                                            @endphp

                                            <div class="mb-2">

                                                @if ($status == 'Hadir')
                                                    <span class="badge bg-success">Hadir</span>
                                                @elseif($status == 'Sakit')
                                                    <span class="badge bg-warning text-dark">Sakit</span>
                                                @elseif($status == 'Izin')
                                                    <span class="badge bg-primary">Izin</span>
                                                @elseif($status == 'Alpha')
                                                    <span class="badge bg-danger">Alpha</span>
                                                @else
                                                    <span class="badge bg-secondary">Belum Absen</span>
                                                @endif

                                            </div>

                                            <select name="status[]" class="form-select rounded-3">

                                                <option value="Hadir" {{ $status == 'Hadir' ? 'selected' : '' }}>
                                                    Hadir
                                                </option>

                                                <option value="Sakit" {{ $status == 'Sakit' ? 'selected' : '' }}>
                                                    Sakit
                                                </option>

                                                <option value="Izin" {{ $status == 'Izin' ? 'selected' : '' }}>
                                                    Izin
                                                </option>

                                                <option value="Alpha" {{ $status == 'Alpha' ? 'selected' : '' }}>
                                                    Alpha
                                                </option>

                                            </select>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3" class="text-center py-4">

                                            Tidak ada data santri

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <div class="mt-3">

                <button type="submit" class="btn btn-success rounded-3 px-4">

                    <i class="bi bi-check-circle me-1"></i>
                    Simpan Absensi

                </button>

            </div>

        </form>
    @endif

@endsection
