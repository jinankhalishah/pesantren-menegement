@extends('layout.appadmin')

@section('content')

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            {{ session('error') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>

        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>

        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
    @endif

    <div class="mb-4">
        <h3 class="fw-semibold">Tambah Jadwal</h3>
        <p class="text-muted mb-0">
            Tambahkan jadwal pelajaran baru
        </p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('jadwal.store') }}" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- Kelas -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Kelas
                        </label>

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

                    <!-- Guru -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Pengajar
                        </label>

                        <select name="guru_id" class="form-select rounded-3 @error('guru_id') is-invalid @enderror">

                            <option value="">-- Pilih Pengajar --</option>

                            @foreach ($guru as $item)
                                <option value="{{ $item->id }}" {{ old('guru_id') == $item->id ? 'selected' : '' }}>

                                    {{ $item->name }}

                                </option>
                            @endforeach

                        </select>

                        @error('guru_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Mata Pelajaran -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Mata Pelajaran
                        </label>

                        <select name="mapel_id" class="form-select rounded-3 @error('mapel_id') is-invalid @enderror">

                            <option value="">-- Pilih Mata Pelajaran --</option>

                            @foreach ($mapel as $item)
                                <option value="{{ $item->id }}" {{ old('mapel_id') == $item->id ? 'selected' : '' }}>

                                    {{ $item->nama_mapel }}

                                </option>
                            @endforeach

                        </select>

                        @error('mapel_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Hari -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Hari
                        </label>

                        <select name="hari" class="form-select rounded-3 @error('hari') is-invalid @enderror">

                            <option value="">-- Pilih Hari --</option>

                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>

                        </select>

                        @error('hari')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Jam Mulai -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Jam Mulai
                        </label>

                        <input type="time" name="jam_mulai"
                            class="form-control rounded-3 @error('jam_mulai') is-invalid @enderror"
                            value="{{ old('jam_mulai') }}">

                        @error('jam_mulai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Jam Selesai -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Jam Selesai
                        </label>

                        <input type="time" name="jam_selesai"
                            class="form-control rounded-3 @error('jam_selesai') is-invalid @enderror"
                            value="{{ old('jam_selesai') }}">

                        @error('jam_selesai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="mt-4 d-flex gap-2">

                    <button type="submit" class="btn btn-success rounded-3 px-4">

                        <i class="bi bi-check-circle me-1"></i>
                        Simpan

                    </button>

                    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary rounded-3 px-4">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
