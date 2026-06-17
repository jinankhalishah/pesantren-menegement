@extends('layout.appadmin')

@section('content')

<div class="mb-4">


<h3 class="fw-semibold">
    Jenis Pembayaran
</h3>

<p class="text-muted mb-0">
    Kelola jenis pembayaran pesantren


</div>

<div class="card border-0 shadow-sm rounded-4">


<div class="card-header bg-white border-0 p-4">

    <div class="d-flex justify-content-end">

        <a href="{{ route('jenis-pembayaran.create') }}"
            class="btn btn-success rounded-3 px-4">

            <i class="bi bi-plus-lg me-1"></i>

            Tambah Data

        </a>

    </div>

</div>

<div class="table-responsive">

    <table class="table align-middle mb-0">

        <thead class="table-light">

            <tr>

                <th class="px-4 py-3" width="80">
                    No
                </th>

                <th class="px-4 py-3">
                    Nama Pembayaran
                </th>

                <th class="px-4 py-3">
                    Kategori
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

            @forelse($data as $item)

                <tr>

                    <td class="px-4 py-3">

                        {{ $loop->iteration }}

                    </td>

                    <td class="px-4 py-3 fw-semibold">

                        {{ $item->nama_pembayaran }}

                    </td>

                    <td class="px-4 py-3 fw-semibold">

                            {{ $item->kategori }}

                        </span>

                    </td>

                    <td class="px-4 py-3 fw-semibold text-success">

                        Rp {{ number_format($item->nominal, 0, ',', '.') }}

                    </td>

                    <td class="px-4 py-3 text-center">

                        <div class="d-flex justify-content-center gap-2">

                            <a href="{{ route('jenis-pembayaran.edit',$item->id) }}"
                                class="btn btn-sm btn-primary rounded-3">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form action="{{ route('jenis-pembayaran.destroy',$item->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="btn btn-sm btn-danger rounded-3">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5"
                        class="text-center py-4 text-muted">

                        Belum ada data

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


</div>

@endsection
