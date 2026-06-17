@extends('layout.appadmin')

@section('content')
    <div class="mb-4">


        <h3 class="fw-semibold">
            Data Pengeluaran
        </h3>

        <p class="text-muted mb-0">
            Kelola data pengeluaran pondok pesantren
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
                            placeholder="Cari pengeluaran..." value="{{ request('search') }}">

                    </div>

                </form>

                <a href="{{ route('pengeluaran.create') }}" class="btn btn-success rounded-3 px-4">

                    <i class="bi bi-plus-lg me-1"></i>

                    Tambah Pengeluaran

                </a>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="px-4 py-3">
                            Tanggal
                        </th>

                        <th class="px-4 py-3">
                            Kategori
                        </th>

                        <th class="px-4 py-3">
                            Keterangan
                        </th>

                        <th class="px-4 py-3">
                            Nominal
                        </th>

                        <th class="px-4 py-3 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse ($pengeluarans as $item)
                        <tr>

                            <td class="px-4 py-3">

                                {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d F Y') }}

                            </td>

                            <td class="px-4 py-3">

                                <span class="badge bg-secondary">

                                    {{ $item->kategori }}

                                </span>

                            </td>

                            <td class="px-4 py-3">

                                {{ $item->keterangan }}

                            </td>

                            <td class="px-4 py-3 fw-semibold text-danger">

                                Rp {{ number_format($item->nominal, 0, ',', '.') }}

                            </td>

                            <td class="px-4 py-3 text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('pengeluaran.edit', $item->id) }}"
                                        class="btn btn-sm btn-primary rounded-3">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
                                            class="btn btn-sm btn-danger rounded-3">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-4">

                                Belum ada data pengeluaran

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>


    </div>
@endsection
