@extends('layout.appadmin')

@section('content')

<div class="mb-4">

    <h3 class="fw-semibold">
        Edit Visi & Misi
    </h3>

    <p class="text-muted mb-0">
        Perbarui visi dan misi pondok pesantren
    </p>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="{{ route('visi-misi.update') }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Visi

                </label>

                <textarea
                    name="visi"
                    rows="4"
                    class="form-control @error('visi') is-invalid @enderror"
                    required>{{ old('visi', $data->visi ?? '') }}</textarea>

                @error('visi')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Misi

                </label>

                <textarea
                    name="misi"
                    rows="8"
                    class="form-control @error('misi') is-invalid @enderror"
                    required>{{ old('misi', $data->misi ?? '') }}</textarea>

                <small class="text-muted">

                    Satu misi setiap baris.

                </small>

                @error('misi')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="d-flex gap-2">

                <button type="submit"
                    class="btn btn-success">

                    <i class="bi bi-check-lg me-1"></i>

                    Simpan

                </button>

                <a href="{{ route('visi-misi.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
