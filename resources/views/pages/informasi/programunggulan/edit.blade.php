@extends('layout.appadmin')

@section('content')

<div class="mb-4">

    <h3 class="fw-semibold">
        Edit Program Unggulan
    </h3>

    <p class="text-muted mb-0">
        Perbarui data program unggulan
    </p>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="{{ route('program-unggulan.update',$program->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Nama Program
                </label>

                <input type="text"
                    name="nama_program"
                    class="form-control"
                    value="{{ old('nama_program',$program->nama_program) }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Level
                </label>

                <input type="text"
                    name="level"
                    class="form-control"
                    value="{{ old('level',$program->level) }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                    rows="4"
                    class="form-control"
                    required>{{ old('deskripsi',$program->deskripsi) }}</textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Status
                </label>

                <select name="status"
                    class="form-select">

                    <option value="1"
                        {{ $program->status == 1 ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="0"
                        {{ $program->status == 0 ? 'selected' : '' }}>
                        Nonaktif
                    </option>

                </select>

            </div>

            <div class="d-flex gap-2">

                <button type="submit"
                    class="btn btn-primary">

                    <i class="bi bi-save"></i>

                    Update

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
