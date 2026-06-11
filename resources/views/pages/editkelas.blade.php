@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Edit Kelas</h3>
        <p class="text-muted mb-0">
            Perbarui data kelas
        </p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Kelas</label>

                    <select name="nama_kelas" class="form-select">

                        <option value="Tsanawiyah" {{ $kelas->nama_kelas == 'Tsanawiyah' ? 'selected' : '' }}>
                            Tsanawiyah
                        </option>

                        <option value="Aliyah" {{ $kelas->nama_kelas == 'Aliyah' ? 'selected' : '' }}>
                            Aliyah
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tingkat</label>

                    <select name="tingkat" class="form-select">

                        <option value="1" {{ $kelas->tingkat == 1 ? 'selected' : '' }}>
                            Kelas 1
                        </option>

                        <option value="2" {{ $kelas->tingkat == 2 ? 'selected' : '' }}>
                            Kelas 2
                        </option>

                        <option value="3" {{ $kelas->tingkat == 3 ? 'selected' : '' }}>
                            Kelas 3
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select">

                        <option value="Aktif" {{ $kelas->status == 'Aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="Nonaktif" {{ $kelas->status == 'Nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>

                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Update
                </button>

                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>
@endsection
