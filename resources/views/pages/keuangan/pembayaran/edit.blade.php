@extends('layout.appadmin')

@section('content')

<div class="mb-4">

    <h3 class="fw-bold mb-1">
        Edit Transaksi Pembayaran
    </h3>

    <p class="text-muted">
        Perbarui data pembayaran santri
    </p>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('transaksi-pembayaran.update', $pembayaran->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Santri
                </label>

                <select
                    name="santri_id"
                    class="form-select"
                    required>

                    <option value="">
                        -- Pilih Santri --
                    </option>

                    @foreach ($santris as $santri)

                        <option
                            value="{{ $santri->id }}"
                            {{ $pembayaran->santri_id == $santri->id ? 'selected' : '' }}>

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
                            data-nominal="{{ $item->nominal }}"
                            {{ $pembayaran->jenis_pembayaran_id == $item->id ? 'selected' : '' }}>

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
                    value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}"
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
                    value="{{ old('tanggal_bayar', $pembayaran->tanggal_bayar) }}"
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

                    <option
                        value="Tunai"
                        {{ $pembayaran->metode_bayar == 'Tunai' ? 'selected' : '' }}>

                        Tunai

                    </option>

                    <option
                        value="Transfer"
                        {{ $pembayaran->metode_bayar == 'Transfer' ? 'selected' : '' }}>

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
                    rows="3">{{ old('keterangan', $pembayaran->keterangan) }}</textarea>

            </div>

            <button
                type="submit"
                class="btn btn-success">

                Update

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
