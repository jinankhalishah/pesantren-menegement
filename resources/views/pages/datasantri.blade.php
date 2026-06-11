@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Data Santri</h3>
        <p class="text-muted mb-0">
            Kelola data santri pondok pesantren
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
                            placeholder="Cari santri..." value="{{ request('search') }}">
                    </div>

                </form>

                <!-- BUTTON -->
                <a href="{{ route('santri.create') }}" class="btn btn-success rounded-3 px-4">
                    <i class="bi bi-plus-lg me-1"></i>
                    Tambah Santri
                </a>

            </div>

        </div>

        <!-- TABLE -->
        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">NIS</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Kelas</th>
                        <th class="px-4 py-3">Jenis Kelamin</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($santris as $santri)
                        <tr>

                            <td class="px-4 py-3">
                                {{ $santri->nis }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $santri->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $santri->kelas->tingkat }} {{ $santri->kelas->nama_kelas }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $santri->gender }}
                            </td>

                            <td class="px-4 py-3">

                                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                    {{ $santri->status }}
                                </span>

                            </td>

                            <td class="px-4 py-3 text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <!-- EDIT -->
                                    <a href="{{ route('santri.edit', $santri->id) }}"
                                        class="btn btn-sm btn-primary rounded-3">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('santri.destroy', $santri->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger rounded-3">
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
