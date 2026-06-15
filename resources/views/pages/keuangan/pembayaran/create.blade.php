@extends('layout.appadmin')

@section('content')

<div class="mb-4">

    <h3 class="fw-bold mb-1">
        Tambah Transaksi Pembayaran
    </h3>

    <p class="text-muted">
        Input pembayaran santri
    </p>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <form action="{{ route('transaksi-pembayaran.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Santri
                </label>

                <select name="santri_id" class="form-select" required>

                    <option value="">
                        -- Pilih Santri --
                    </option>

                    @foreach ($santris as $santri)

                        <option value="{{ $santri->id }}">

                            {{ $santri->nis }}
                            -
                            {{ $santri->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Jenis Pembayaran
                </label>

                <select
                    name="jenis_pembayaran_id"
                    id="jenis_pembayaran"
                    class="form-select"
                    required>

                    <option value="">
                        -- Pilih Jenis Pembayaran --
                    </option>

                    @foreach ($jenisPembayarans as $item)

                        <option
                            value="{{ $item->id }}"
                            data-nominal="{{ $item->nominal }}">

                            {{ $item->nama_pembayaran }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nominal
                </label>

                <input
                    type="number"
                    name="jumlah_bayar"
                    id="jumlah_bayar"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Tanggal Bayar
                </label>

                <input
                    type="date"
                    name="tanggal_bayar"
                    class="form-control"
                    value="{{ date('Y-m-d') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Metode Bayar
                </label>

                <select
                    name="metode_bayar"
                    class="form-select"
                    required>

                    <option value="Tunai">
                        Tunai
                    </option>

                    <option value="Transfer">
                        Transfer
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Keterangan
                </label>

                <textarea
                    name="keterangan"
                    class="form-control"
                    rows="3"></textarea>

            </div>

            <button
                type="submit"
                class="btn btn-success">

                Simpan

            </button>

            <a
                href="{{ route('transaksi-pembayaran.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

<script>

document
.getElementById('jenis_pembayaran')
.addEventListener('change', function() {

    let nominal =
        this.options[this.selectedIndex]
        .getAttribute('data-nominal');

    document
        .getElementById('jumlah_bayar')
        .value = nominal ?? '';

});

</script>

@endsection
