@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Tambah Santri</h3>
        <p class="text-muted mb-0">
            Tambahkan data santri baru
        </p>
    </div>

    <!-- CARD FORM -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('santri.store') }}" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- NIS -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">NIS</label>

                        <input type="text" name="nis"
                            class="form-control rounded-3 @error('nis') is-invalid @enderror" placeholder="Masukkan NIS"
                            value="{{ old('nis') }}">

                        @error('nis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Nama -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Nama Santri</label>

                        <input type="text" name="name"
                            class="form-control rounded-3 @error('name') is-invalid @enderror"
                            placeholder="Masukkan nama santri" value="{{ old('name') }}">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Kelas -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Kelas</label>

                        <select name="kelas_id" class="form-select rounded-3 @error('kelas_id') is-invalid @enderror">
                            <option value="">-- Pilih Kelas --</option>

                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}" {{ old('kelas_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->tingkat }} {{ $item->nama_kelas }}
                                </option>
                            @endforeach

                        </select>

                        @error('kelas_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Gender -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Jenis Kelamin</label>

                        <select name="gender" class="form-select rounded-3 @error('gender') is-invalid @enderror">
                            <option value="">-- Pilih Jenis Kelamin --</option>

                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>

                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>

                        </select>

                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Status -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Status</label>

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

                    <a href="{{ route('santri.index') }}" class="btn btn-secondary rounded-3 px-4">
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
