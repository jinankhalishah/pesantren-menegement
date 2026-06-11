@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Data Mata Pelajaran</h3>
        <p class="text-muted mb-0">
            Kelola data mata pelajaran pondok pesantren
        </p>
    </div>

    <!-- CARD TABLE -->
    <div class="card border-0 shadow-sm rounded-4">

        <!-- HEADER -->
        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex flex-column flex-md-row justify-content-between gap-3">

                <!-- SEARCH -->
                <form action="" method="GET" class="w-100" style="max-width: 350px;">

                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>

                        <input type="text" name="search" class="form-control border-start-0"
                            placeholder="Cari mata pelajaran..." value="{{ request('search') }}">
                    </div>

                </form>

                <!-- BUTTON -->
                <a href="{{ route('mapel.create') }}" class="btn btn-success rounded-3 px-4">
                    <i class="bi bi-plus-lg me-1"></i>
                    Tambah Mata Pelajaran
                </a>

            </div>

        </div>

        <!-- TABLE -->
        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">Kode</th>
                        <th class="px-4 py-3">Mata Pelajaran</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($mapels as $mapel)
                        <tr>

                            <td class="px-4 py-3">
                                {{ $mapel->kode }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $mapel->nama_mapel }}
                            </td>

                            <td class="px-4 py-3">

                                <span
                                    class="badge {{ $mapel->status == 'Aktif' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} px-3 py-2 rounded-pill">
                                    {{ $mapel->status }}
                                </span>

                            </td>

                            <td class="px-4 py-3 text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('mapel.edit', $mapel->id) }}"
                                        class="btn btn-sm btn-primary rounded-3">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger rounded-3"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                Data mata pelajaran belum tersedia
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
