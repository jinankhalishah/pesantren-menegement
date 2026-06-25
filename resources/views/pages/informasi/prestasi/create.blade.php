@extends('layout.appadmin')

@section('content')

<div class="mb-4">
    <h3 class="fw-semibold">Tambah Prestasi</h3>
    <p class="text-muted mb-0">Tambahkan prestasi pesantren</p>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <form action="{{ route('prestasi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul Prestasi</label>
                <input type="text" name="judul" class="form-control"
                    value="{{ old('judul') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <select name="tingkat" class="form-select" required>
                    <option value="">-- Pilih Tingkat --</option>
                    <option value="Kabupaten" {{ old('tingkat') == 'Kabupaten' ? 'selected' : '' }}>
                        Kabupaten
                    </option>
                    <option value="Provinsi" {{ old('tingkat') == 'Provinsi' ? 'selected' : '' }}>
                        Provinsi
                    </option>
                    <option value="Nasional" {{ old('tingkat') == 'Nasional' ? 'selected' : '' }}>
                        Nasional
                    </option>
                    <option value="Internasional" {{ old('tingkat') == 'Internasional' ? 'selected' : '' }}>
                        Internasional
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="tahun" class="form-control"
                    value="{{ old('tahun') }}">
            </div>

            <div class="mb-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Simpan
                </button>

                <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
