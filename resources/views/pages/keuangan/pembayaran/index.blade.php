@extends('layout.appadmin')

@section('content')

<div class="mb-4">

    <h3 class="fw-bold mb-1">
        Transaksi Pembayaran
    </h3>

    <p class="text-muted">
        Kelola data pembayaran santri
    </p>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center">

            <form action="" method="GET" class="w-50">

                <div class="input-group">

                    <span class="input-group-text bg-white border-end-0">

                        <i class="bi bi-search"></i>

                    </span>

                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control border-start-0"
                        placeholder="Cari pembayaran...">

                </div>

            </form>

            <a href="{{ route('transaksi-pembayaran.create') }}"
                class="btn btn-success px-4 rounded-3">

                <i class="bi bi-plus-lg"></i>

                Tambah Pembayaran

            </a>

        </div>

    </div>

    <div class="table-responsive">

        <table class="table align-middle mb-0">

            <thead class="table-light">

                <tr>

                    <th width="60">
                        No
                    </th>

                    <th>
                        Tanggal
                    </th>

                    <th>
                        Santri
                    </th>

                    <th>
                        Jenis Pembayaran
                    </th>

                    <th>
                        Nominal
                    </th>

                    <th>
                        Metode
                    </th>

                    <th class="text-center" width="170">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($pembayarans as $item)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d/m/Y') }}

                        </td>

                        <td>

                            <div class="fw-semibold">

                                {{ $item->santri->name }}

                            </div>

                            <small class="text-muted">

                                {{ $item->santri->nis }}

                            </small>

                        </td>

                        <td>

                            {{ $item->jenisPembayaran->nama_pembayaran }}

                        </td>

                        <td>

                            Rp {{ number_format($item->jumlah_bayar,0,',','.') }}

                        </td>

                        <td>

                            @if($item->metode_bayar == 'Tunai')

                                <span class="badge rounded-pill text-bg-success px-3 py-2">

                                    Tunai

                                </span>

                            @else

                                <span class="badge rounded-pill text-bg-primary px-3 py-2">

                                    Transfer

                                </span>

                            @endif

                        </td>

                        <td class="text-center">

                            <a href="{{ route('transaksi-pembayaran.edit',$item->id) }}"
                                class="btn btn-primary btn-sm">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <a href="{{ route('transaksi-pembayaran.kwitansi', $item->id) }}"
                                target="_blank"
                                class="btn btn-info btn-sm text-white">

                                <i class="bi bi-printer"></i>

                            </a>

                            <form action="{{ route('transaksi-pembayaran.destroy',$item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="btn btn-danger btn-sm">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-4 text-muted">

                            Belum ada data pembayaran

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
