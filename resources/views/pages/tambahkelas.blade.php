@extends('layout.appadmin')

@section('content')
    <div class="mb-4">
        <h3 class="fw-semibold">Tambah Kelas</h3>
        <p class="text-muted mb-0">
            Tambahkan data kelas baru
        </p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('kelas.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Kelas</label>

                    <select name="nama_kelas" class="form-select" required>
                        <option value="">-- Pilih Jenjang --</option>
                        <option value="Tsanawiyah">Tsanawiyah</option>
                        <option value="Aliyah">Aliyah</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tingkat</label>

                    <select name="tingkat" class="form-select" required>
                        <option value="">-- Pilih Tingkat --</option>
                        <option value="1">Kelas 1</option>
                        <option value="2">Kelas 2</option>
                        <option value="3">Kelas 3</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan
                </button>

                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>
@endsection
