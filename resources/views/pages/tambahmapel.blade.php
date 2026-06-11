@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Tambah Mata Pelajaran</h3>
        <p class="text-muted mb-0">
            Tambahkan data mata pelajaran baru
        </p>
    </div>

    <!-- CARD FORM -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('mapel.store') }}" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- Kode -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Kode Mata Pelajaran
                        </label>

                        <input type="text" name="kode"
                            class="form-control rounded-3 @error('kode') is-invalid @enderror" placeholder="Contoh: MPL001"
                            value="{{ old('kode') }}">

                        @error('kode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Nama Mapel -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Mata Pelajaran
                        </label>

                        <input type="text" name="nama_mapel"
                            class="form-control rounded-3 @error('nama_mapel') is-invalid @enderror"
                            placeholder="Masukkan nama mata pelajaran" value="{{ old('nama_mapel') }}">

                        @error('nama_mapel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Status -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status" class="form-select rounded-3 @error('status') is-invalid @enderror">

                            <option value="">-- Pilih Status --</option>

                            <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>
                                Nonaktif
                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="mt-4 d-flex gap-2">

                    <button type="submit" class="btn btn-success rounded-3 px-4">

                        <i class="bi bi-check-circle me-1"></i>
                        Simpan

                    </button>

                    <a href="{{ route('mapel.index') }}" class="btn btn-secondary rounded-3 px-4">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
