@extends('layout.appadmin')

@section('content')

    <div class="mb-4">

        <h3 class="fw-bold mb-1">
            Rekap Absensi
        </h3>

        <p class="text-muted">
            Rekap absensi bulanan santri
        </p>

    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row g-3">

                    <div class="col-md-4">

                        <label class="form-label">
                            Bulan
                        </label>

                        <input type="month" name="bulan" value="{{ request('bulan') }}" class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label class="form-label">
                            Kelas
                        </label>

                        <select name="kelas_id" class="form-select">

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

                    <div class="col-md-4 d-flex align-items-end">

                        <button type="submit" class="btn btn-success">

                            <i class="bi bi-search"></i>

                            Tampilkan

                        </button>

                        @if (request('kelas_id') && request('bulan'))
                            <a href="{{ route('absensi.rekap.pdf', [
                                'kelas_id' => request('kelas_id'),
                                'bulan' => request('bulan'),
                            ]) }}"
                                target="_blank" class="btn btn-danger ms-2">

                                <i class="bi bi-file-earmark-pdf"></i>
                                PDF
                            </a>
                        @endif

                    </div>

                </div>

            </form>

        </div>

    </div>

    @if ($rekap->count())
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover mb-0">

                        <thead class="table-success">

                            <tr>

                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Hadir</th>
                                <th>Sakit</th>
                                <th>Izin</th>
                                <th>Alpha</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($rekap as $santri)
                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $santri->nis }}
                                    </td>

                                    <td>
                                        {{ $santri->name }}
                                    </td>

                                    <td>

                                        {{ $santri->absensi->where('status', 'Hadir')->count() }}

                                    </td>

                                    <td>

                                        {{ $santri->absensi->where('status', 'Sakit')->count() }}

                                    </td>

                                    <td>

                                        {{ $santri->absensi->where('status', 'Izin')->count() }}

                                    </td>

                                    <td>

                                        {{ $santri->absensi->where('status', 'Alpha')->count() }}

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    @endif

@endsection
