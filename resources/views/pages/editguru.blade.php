```php id="m8w2p7"
@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Edit Pengajar</h3>
        <p class="text-muted mb-0">
            Perbarui data pengajar pondok pesantren
        </p>
    </div>

    <!-- CARD FORM -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('guru.update', $guru->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- NIP -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            NIP
                        </label>

                        <input type="text" name="nip"
                            class="form-control rounded-3 @error('nip') is-invalid @enderror" placeholder="Masukkan NIP"
                            value="{{ old('nip', $guru->nip) }}">

                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Nama -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama Pengajar
                        </label>

                        <input type="text" name="name"
                            class="form-control rounded-3 @error('name') is-invalid @enderror"
                            placeholder="Masukkan nama pengajar" value="{{ old('name', $guru->name) }}">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Mapel -->
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Mata Pelajaran
                        </label>

                        <select name="mapel_id" class="form-select rounded-3 @error('mapel_id') is-invalid @enderror">

                            <option value="">-- Pilih Mata Pelajaran --</option>

                            @foreach ($mapels as $mapel)
                                <option value="{{ $mapel->id }}"
                                    {{ old('mapel_id', $guru->mapel_id) == $mapel->id ? 'selected' : '' }}>
                                    {{ $mapel->nama_mapel }}
                                </option>
                            @endforeach

                        </select>

                        @error('mapel_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            No. Telepon
                        </label>

                        <input type="text" name="phone"
                            class="form-control rounded-3 @error('phone') is-invalid @enderror"
                            placeholder="Masukkan no. telepon" value="{{ old('phone', $guru->phone) }}">

                        @error('phone')
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

                            <option value="Aktif" {{ old('status', $guru->status) == 'Aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="Nonaktif" {{ old('status', $guru->status) == 'Nonaktif' ? 'selected' : '' }}>
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

                    <a href="{{ route('guru.index') }}" class="btn btn-secondary rounded-3 px-4">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection

