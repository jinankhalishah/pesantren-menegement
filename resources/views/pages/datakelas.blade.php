@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Data Kelas</h3>
        <p class="text-muted mb-0">
            Kelola data kelas pondok pesantren
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

                        <input type="text" name="search" class="form-control border-start-0" placeholder="Cari kelas..."
                            value="{{ request('search') }}">

                    </div>

                </form>

                <!-- BUTTON -->
                <a href="{{ route('kelas.create') }}" class="btn btn-success rounded-3 px-4">

                    <i class="bi bi-plus-lg me-1"></i>
                    Tambah Kelas

                </a>

            </div>

        </div>

        <!-- TABLE -->
        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama Kelas</th>
                        <th class="px-4 py-3">Tingkat</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($kelas as $item)
                        <tr>

                            <td class="px-4 py-3">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item->nama_kelas }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item->tingkat }}
                            </td>

                            <td class="px-4 py-3">

                                <span
                                    class="badge
                            {{ $item->status == 'Aktif' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}
                            px-3 py-2 rounded-pill">

                                    {{ $item->status }}

                                </span>

                            </td>

                            <td class="px-4 py-3 text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <!-- EDIT -->
                                    <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-sm btn-primary rounded-3">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <!-- DETAIL -->
                                    <a href="{{ route('kelas.jadwal', $item->id) }}" class="btn btn-sm btn-info rounded-3">
                                        <i class="bi bi-calendar-week"></i>
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('kelas.destroy', $item->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger rounded-3"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-4 text-muted">

                                Belum ada data kelas

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
