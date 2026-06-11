@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Data Jadwal</h3>
        <p class="text-muted mb-0">
            Kelola jadwal pelajaran pondok pesantren
        </p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex flex-column flex-md-row justify-content-between gap-3">

                <form action="" method="GET" class="w-100" style="max-width: 350px;">

                    <div class="input-group">

                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>

                        <input type="text" name="search" class="form-control border-start-0"
                            placeholder="Cari jadwal..." value="{{ request('search') }}">

                    </div>

                </form>

                <a href="{{ route('jadwal.create') }}" class="btn btn-success rounded-3 px-4">

                    <i class="bi bi-plus-lg me-1"></i>
                    Tambah Jadwal

                </a>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="px-4 py-3">Hari</th>
                        <th class="px-4 py-3">Jam</th>
                        <th class="px-4 py-3">Kelas</th>
                        <th class="px-4 py-3">Mata Pelajaran</th>
                        <th class="px-4 py-3">Pengajar</th>
                        <th class="px-4 py-3 text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse ($jadwals as $jadwal)
                        <tr>

                            <td class="px-4 py-3">
                                {{ $jadwal->hari }}
                            </td>

                            <td class="px-4 py-3">
                                {{ substr($jadwal->jam_mulai, 0, 5) }}
                                -
                                {{ substr($jadwal->jam_selesai, 0, 5) }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $jadwal->kelas?->tingkat }}
                                {{ $jadwal->kelas?->nama_kelas }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $jadwal->mapel?->nama_mapel }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $jadwal->guru?->name }}
                            </td>

                            <td class="px-4 py-3 text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('jadwal.edit', $jadwal->id) }}"
                                        class="btn btn-sm btn-primary rounded-3">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger rounded-3">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-4">
                                Belum ada data jadwal
                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
