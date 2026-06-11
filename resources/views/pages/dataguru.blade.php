@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Data Pengajar</h3>
        <p class="text-muted mb-0">
            Kelola data pengajar pondok pesantren
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
                            placeholder="Cari pengajar..." value="{{ request('search') }}">
                    </div>

                </form>

                <!-- BUTTON -->
                <a href="{{ route('guru.create') }}" class="btn btn-success rounded-3 px-4">
                    <i class="bi bi-plus-lg me-1"></i>
                    Tambah Pengajar
                </a>

            </div>

        </div>

        <!-- TABLE -->
        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">NIP</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Mata Pelajaran</th>
                        <th class="px-4 py-3">No. Telepon</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($gurus as $guru)
                        <tr>

                            <td class="px-4 py-3">
                                {{ $guru->nip }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $guru->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $guru->mapel?->nama_mapel ?? '-' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $guru->phone }}
                            </td>

                            <td class="px-4 py-3">

                                <span
                                    class="badge
                            {{ $guru->status == 'Aktif' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}
                            px-3 py-2 rounded-pill">

                                    {{ $guru->status }}

                                </span>


                            </td>

                            <td class="px-4 py-3 text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <!-- EDIT -->
                                    <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-sm btn-primary rounded-3">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('guru.destroy', $guru->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger rounded-3"
                                            onclick="return confirm('Yakin ingin menghapus data pengajar ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection
