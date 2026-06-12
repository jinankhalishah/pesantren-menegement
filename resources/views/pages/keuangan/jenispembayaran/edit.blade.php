@extends('layout.appadmin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="fw-bold mb-1">
            Edit Jenis Pembayaran
        </h3>

        <p class="text-muted mb-0">
            Ubah data pembayaran
        </p>

    </div>

    <a href="{{ route('jenis-pembayaran.index') }}"
       class="btn btn-secondary rounded-3">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <form action="{{ route('jenis-pembayaran.update',$jenispembayaran->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Nama Pembayaran
                </label>

                <input type="text"
                       name="nama_pembayaran"
                       value="{{ $jenispembayaran->nama_pembayaran }}"
                       class="form-control rounded-3"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Kategori
                </label>

                <select name="kategori"
                        class="form-select rounded-3">

                    <option value="Bulanan"
                        {{ $jenispembayaran->kategori == 'Bulanan' ? 'selected' : '' }}>
                        Bulanan
                    </option>

                    <option value="Tahunan"
                        {{ $jenispembayaran->kategori == 'Tahunan' ? 'selected' : '' }}>
                        Tahunan
                    </option>

                    <option value="Sekali Bayar"
                        {{ $jenispembayaran->kategori == 'Sekali Bayar' ? 'selected' : '' }}>
                        Sekali Bayar
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nominal
                </label>

                <input type="number"
                       name="nominal"
                       value="{{ $jenispembayaran->nominal }}"
                       class="form-control rounded-3"
                       required>

            </div>

            <button type="submit"
                    class="btn btn-warning rounded-3">

                Update

            </button>

        </form>

    </div>

</div>

@endsection
