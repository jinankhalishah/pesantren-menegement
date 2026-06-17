@extends('layout.appadmin')

@section('content')

<div class="mb-4">


<h3 class="fw-bold mb-1">
    Tambah Pengeluaran
</h3>

<p class="text-muted">
    Tambahkan data pengeluaran pesantren
</p>


</div>

<div class="card border-0 shadow-sm rounded-4">


<div class="card-body">

    <form action="{{ route('pengeluaran.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Tanggal
            </label>

            <input type="date"
                name="tanggal"
                value="{{ old('tanggal') }}"
                class="form-control @error('tanggal') is-invalid @enderror">

            @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">
                Kategori
            </label>

            <select name="kategori"
                class="form-select @error('kategori') is-invalid @enderror">

                <option value="">
                    -- Pilih Kategori --
                </option>

                <option value="Listrik">
                    Listrik
                </option>

                <option value="Air">
                    Air
                </option>

                <option value="ATK">
                    ATK
                </option>

                <option value="Konsumsi">
                    Konsumsi
                </option>

                <option value="Transportasi">
                    Transportasi
                </option>

                <option value="Perawatan Gedung">
                    Perawatan Gedung
                </option>

                <option value="Kegiatan Santri">
                    Kegiatan Santri
                </option>

                <option value="Lainnya">
                    Lainnya
                </option>

            </select>

            @error('kategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">
                Keterangan
            </label>

            <textarea name="keterangan"
                rows="3"
                class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>

            @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">
                Nominal
            </label>

            <input type="number"
                name="nominal"
                value="{{ old('nominal') }}"
                class="form-control @error('nominal') is-invalid @enderror">

            @error('nominal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="d-flex gap-2">

            <button type="submit"
                class="btn btn-success">

                <i class="bi bi-save"></i>

                Simpan

            </button>

            <a href="{{ route('pengeluaran.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>


</div>

@endsection
