@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Edit Jadwal</h3>
        <p class="text-muted mb-0">
            Perbarui data jadwal pelajaran
        </p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- Kelas -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Kelas
                        </label>

                        <select name="kelas_id" class="form-select rounded-3 @error('kelas_id') is-invalid @enderror">

                            <option value="">-- Pilih Kelas --</option>

                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('kelas_id', $jadwal->kelas_id) == $item->id ? 'selected' : '' }}>

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
                                <option value="{{ $item->id }}"
                                    {{ old('guru_id', $jadwal->guru_id) == $item->id ? 'selected' : '' }}>

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
                                <option value="{{ $item->id }}"
                                    {{ old('mapel_id', $jadwal->mapel_id) == $item->id ? 'selected' : '' }}>

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

                            <option value="Senin" {{ old('hari', $jadwal->hari) == 'Senin' ? 'selected' : '' }}>Senin
                            </option>
                            <option value="Selasa" {{ old('hari', $jadwal->hari) == 'Selasa' ? 'selected' : '' }}>Selasa
                            </option>
                            <option value="Rabu" {{ old('hari', $jadwal->hari) == 'Rabu' ? 'selected' : '' }}>Rabu
                            </option>
                            <option value="Kamis" {{ old('hari', $jadwal->hari) == 'Kamis' ? 'selected' : '' }}>Kamis
                            </option>
                            <option value="Jumat" {{ old('hari', $jadwal->hari) == 'Jumat' ? 'selected' : '' }}>Jumat
                            </option>
                            <option value="Sabtu" {{ old('hari', $jadwal->hari) == 'Sabtu' ? 'selected' : '' }}>Sabtu
                            </option>

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
                            value="{{ old('jam_mulai', $jadwal->jam_mulai) }}">

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
                            value="{{ old('jam_selesai', $jadwal->jam_selesai) }}">

                        @error('jam_selesai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="mt-4 d-flex gap-2">

                    <button type="submit" class="btn btn-primary rounded-3 px-4">
                        <i class="bi bi-check-circle me-1"></i>
                        Update
                    </button>

                    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary rounded-3 px-4">
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
