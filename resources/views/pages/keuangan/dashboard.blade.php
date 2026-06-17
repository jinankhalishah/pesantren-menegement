@extends('layout.appadmin')

@section('content')
    <div class="mb-4">


        <h3 class="fw-semibold">
            Dashboard Keuangan
        </h3>

        <p class="text-muted mb-0">
            Ringkasan dan rekap keuangan pesantren
        </p>

    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row g-3 align-items-end">

                    <div class="col-md-4">

                        <label class="form-label">
                            Tanggal Awal
                        </label>

                        <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}" class="form-control">

                    </div>

                    <div class="col-md-4">

                        <label class="form-label">
                            Tanggal Akhir
                        </label>

                        <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}"
                            class="form-control">

                    </div>

                    <div class="col-md-4">

                        <button type="submit" class="btn btn-success">

                            <i class="bi bi-search"></i>

                            Tampilkan

                        </button>

                        <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">

                            Reset

                        </a>

                        <a href="{{ route('keuangan.pdf') }}?tanggal_awal={{ request('tanggal_awal') }}&tanggal_akhir={{ request('tanggal_akhir') }}"
                            target="_blank" class="btn btn-danger">

                            <i class="bi bi-file-earmark-pdf"></i>
                            PDF

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="row g-4 mb-4">


        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <small class="text-muted">
                        Total Pemasukan
                    </small>

                    <h3 class="fw-bold text-success mt-2">

                        Rp {{ number_format($totalPemasukan, 0, ',', '.') }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <small class="text-muted">
                        Total Pengeluaran
                    </small>

                    <h3 class="fw-bold text-danger mt-2">

                        Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <small class="text-muted">
                        Saldo
                    </small>

                    <h3 class="fw-bold text-primary mt-2">

                        Rp {{ number_format($saldo, 0, ',', '.') }}

                    </h3>

                </div>

            </div>

        </div>


    </div>

    <div class="row g-4 mb-4">


        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <small class="text-muted">
                        Pemasukan Bulan Ini
                    </small>

                    <h4 class="fw-semibold text-success mt-2">

                        Rp {{ number_format($pemasukanBulanIni, 0, ',', '.') }}

                    </h4>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <small class="text-muted">
                        Pengeluaran Bulan Ini
                    </small>

                    <h4 class="fw-semibold text-danger mt-2">

                        Rp {{ number_format($pengeluaranBulanIni, 0, ',', '.') }}

                    </h4>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <small class="text-muted">
                        Transaksi Hari Ini
                    </small>

                    <h4 class="fw-semibold mt-2">

                        {{ $transaksiHariIni }}

                    </h4>

                </div>

            </div>

        </div>


    </div>

    <div class="row g-4">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0">

                    <h6 class="fw-semibold mb-0">
                        Transaksi Pembayaran Terbaru
                    </h6>

                </div>

                <div class="table-responsive">

                    <table class="table align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="px-4 py-3">
                                    Tanggal
                                </th>

                                <th class="px-4 py-3">
                                    Santri
                                </th>

                                <th class="px-4 py-3">
                                    Jenis Pembayaran
                                </th>

                                <th class="px-4 py-3">
                                    Nominal
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($transaksiTerbaru as $item)
                                <tr>

                                    <td class="px-4 py-3">

                                        {{ \Carbon\Carbon::parse($item->tanggal_bayar)->locale('id')->translatedFormat('d F Y') }}

                                    </td>

                                    <td class="px-4 py-3">

                                        {{ $item->santri->name }}

                                    </td>

                                    <td class="px-4 py-3">

                                        {{ $item->jenisPembayaran->nama_pembayaran }}

                                    </td>

                                    <td class="px-4 py-3 fw-semibold text-success">

                                        Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="text-center py-4">

                                        Belum ada transaksi

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0">

                    <h6 class="fw-semibold mb-0">
                        Pengeluaran Terbaru
                    </h6>

                </div>

                <div class="card-body">

                    @forelse($pengeluaranTerbaru as $item)
                        <div class="border-bottom pb-2 mb-2">

                            <div class="fw-semibold">

                                {{ $item->kategori }}

                            </div>

                            <small class="text-muted">

                                {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d F Y') }}

                            </small>

                            <div class="text-danger fw-semibold">

                                Rp {{ number_format($item->nominal, 0, ',', '.') }}

                            </div>

                        </div>

                    @empty

                        <p class="text-muted mb-0">

                            Belum ada pengeluaran

                        </p>
                    @endforelse

                </div>

            </div>

        </div>

    </div>
@endsection
