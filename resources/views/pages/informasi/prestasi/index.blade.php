@extends('layout.appadmin')

@section('content')

<div class="mb-4">

    <h3 class="fw-semibold">
        Data Prestasi
    </h3>

    <p class="text-muted mb-0">
        Kelola data prestasi pesantren
    </p>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white border-0 p-4">

        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">

            <form method="GET" class="w-100" style="max-width:350px;">

                <div class="input-group">

                    <span class="input-group-text bg-white border-end-0">

                        <i class="bi bi-search text-muted"></i>

                    </span>

                    <input type="text"
                        name="search"
                        class="form-control border-start-0"
                        placeholder="Cari prestasi..."
                        value="{{ request('search') }}">

                </div>

            </form>

            <a href="{{ route('prestasi.create') }}"
                class="btn btn-success rounded-3 px-4">

                <i class="bi bi-plus-lg me-1"></i>

                Tambah Prestasi

            </a>

        </div>

    </div>

    <div class="table-responsive">

        <table class="table align-middle mb-0">

            <thead class="table-light">

                <tr>

                    <th class="px-4 py-3">
                        No
                    </th>

                    <th class="px-4 py-3">
                        Judul
                    </th>

                    <th class="px-4 py-3">
                        Tingkat
                    </th>

                    <th class="px-4 py-3">
                        Tahun
                    </th>

                    <th class="px-4 py-3">
                        Status
                    </th>

                    <th class="px-4 py-3 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($data as $item)

                <tr>

                    <td class="px-4 py-3">

                        {{ $loop->iteration }}

                    </td>

                    <td class="px-4 py-3">

                        {{ $item->judul }}

                    </td>

                    <td class="px-4 py-3">

                        {{ $item->tingkat }}

                    </td>

                    <td class="px-4 py-3">

                        {{ $item->tahun }}

                    </td>

                    <td class="px-4 py-3">

                        @if($item->status)

                            <span class="badge bg-success">

                                Aktif

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Nonaktif

                            </span>

                        @endif

                    </td>

                    <td class="px-4 py-3 text-center">

                        <a href="{{ route('prestasi.edit',$item->id) }}"
                            class="btn btn-sm btn-primary">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                        <form action="{{ route('prestasi.destroy',$item->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus data?')"
                                class="btn btn-sm btn-danger">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-4">

                        Belum ada data prestasi

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
