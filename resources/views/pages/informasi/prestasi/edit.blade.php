@extends('layout.appadmin')

@section('content')

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white">

        <h5 class="mb-0">
            Edit Prestasi
        </h5>

    </div>

    <div class="card-body">

        <form action="{{ route('prestasi.update',$prestasi->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Judul Prestasi
                </label>

                <input type="text"
                    name="judul"
                    value="{{ $prestasi->judul }}"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Tingkat
                </label>

                <select name="tingkat"
                    class="form-control">

                    <option value="Kabupaten" {{ $prestasi->tingkat == 'Kabupaten' ? 'selected' : '' }}>
                        Kabupaten
                    </option>

                    <option value="Provinsi" {{ $prestasi->tingkat == 'Provinsi' ? 'selected' : '' }}>
                        Provinsi
                    </option>

                    <option value="Nasional" {{ $prestasi->tingkat == 'Nasional' ? 'selected' : '' }}>
                        Nasional
                    </option>

                    <option value="Internasional" {{ $prestasi->tingkat == 'Internasional' ? 'selected' : '' }}>
                        Internasional
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Tahun
                </label>

                <input type="number"
                    name="tahun"
                    value="{{ $prestasi->tahun }}"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Status
                </label>

                <select name="status"
                    class="form-control">

                    <option value="1" {{ $prestasi->status ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="0" {{ !$prestasi->status ? 'selected' : '' }}>
                        Nonaktif
                    </option>

                </select>

            </div>

            <button class="btn btn-success">

                Update

            </button>

            <a href="{{ route('prestasi.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection
