@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Edit Santri</h3>
        <p class="text-muted mb-0">
            Perbarui data santri pondok pesantren
        </p>
    </div>

    <!-- CARD FORM -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('santri.update', $santri->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- NIS -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            NIS
                        </label>

                        <input type="text" name="nis"
                            class="form-control rounded-3 @error('nis') is-invalid @enderror" placeholder="Masukkan NIS"
                            value="{{ old('nis', $santri->nis) }}">

                        @error('nis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Nama -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Santri
                        </label>

                        <input type="text" name="name"
                            class="form-control rounded-3 @error('name') is-invalid @enderror"
                            placeholder="Masukkan nama santri" value="{{ old('name', $santri->name) }}">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Kelas -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Kelas
                        </label>

                        <select name="kelas_id" class="form-select rounded-3 @error('kelas_id') is-invalid @enderror">

                            <option value="">-- Pilih Kelas --</option>

                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('kelas_id', $santri->kelas_id) == $item->id ? 'selected' : '' }}>
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

                        <label class="form-label fw-semibold">
                            Jenis Kelamin
                        </label>

                        <select name="gender" class="form-select rounded-3 @error('gender') is-invalid @enderror">

                            <option value="">-- Pilih Jenis Kelamin --</option>

                            <option value="Laki-laki"
                                {{ old('gender', $santri->gender) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>

                            <option value="Perempuan"
                                {{ old('gender', $santri->gender) == 'Perempuan' ? 'selected' : '' }}>
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

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status" class="form-select rounded-3 @error('status') is-invalid @enderror">

                            <option value="">-- Pilih Status --</option>

                            <option value="Aktif" {{ old('status', $santri->status) == 'Aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="Nonaktif" {{ old('status', $santri->status) == 'Nonaktif' ? 'selected' : '' }}>
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

                    <button type="submit" class="btn btn-primary rounded-3 px-4">

                        <i class="bi bi-check-circle me-1"></i>
                        Update

                    </button>

                    <a href="{{ route('santri.index') }}" class="btn btn-secondary rounded-3 px-4">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
