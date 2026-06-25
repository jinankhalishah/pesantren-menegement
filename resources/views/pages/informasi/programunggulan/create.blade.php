@extends('layout.appadmin')

@section('content')

<div class="mb-4">

    <h3 class="fw-semibold">
        Tambah Program Unggulan
    </h3>

    <p class="text-muted mb-0">
        Tambahkan program unggulan pesantren
    </p>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="{{ route('program-unggulan.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Nama Program
                </label>

                <input type="text"
                    name="nama_program"
                    class="form-control"
                    value="{{ old('nama_program') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Level
                </label>

                <input type="text"
                    name="level"
                    class="form-control"
                    value="{{ old('level') }}"
                    placeholder="Contoh: Semua Tingkat"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                    rows="4"
                    class="form-control"
                    required>{{ old('deskripsi') }}</textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Status
                </label>

                <select name="status"
                    class="form-select">

                    <option value="1">
                        Aktif
                    </option>

                    <option value="0">
                        Nonaktif
                    </option>

                </select>

            </div>

            <div class="d-flex gap-2">

                <button type="submit"
                    class="btn btn-success">

                    <i class="bi bi-save"></i>

                    Simpan

                </button>

                <a href="{{ route('program-unggulan.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
