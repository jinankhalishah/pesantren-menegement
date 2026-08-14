@extends('layout.appadmin')

@section('content')
    <div class="mb-4">

        <h3 class="fw-semibold">
            Tambah Berita
        </h3>

        <p class="text-muted mb-0">
            Tambahkan berita terbaru pondok pesantren
        </p>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- Judul --}}
                    <div class="col-lg-8 mb-4">

                        <label class="form-label fw-semibold">
                            Judul Berita
                        </label>

                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul') }}">

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Upload Gambar --}}
                    <div class="col-lg-4 mb-4">

                        <label class="form-label fw-semibold">

                            Gambar Berita

                        </label>

                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambar">

                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <small class="text-muted">
                            Format: JPG, JPEG, PNG, WEBP. Maksimal 8 MB.
                        </small>

                    </div>

                </div>

                {{-- Preview --}}
                <div class="mb-4">

                    <img id="preview" src="" class="img-fluid rounded shadow-sm d-none" style="max-height:250px;">

                </div>

                {{-- Ringkasan --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Ringkasan

                    </label>

                    <textarea name="ringkasan" rows="3" class="form-control">{{ old('ringkasan') }}</textarea>

                </div>

                {{-- Isi --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Isi Berita

                    </label>

                    <textarea name="isi" id="editor">
                        {{ old('isi') }}
                    </textarea>

                </div>

                <div class="d-flex gap-2">

                    <button class="btn btn-success">

                        <i class="bi bi-check-circle me-1"></i>

                        Simpan

                    </button>

                    <a href="{{ route('berita.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        gambar.onchange = evt => {

            const [file] = gambar.files;

            if (file) {

                preview.src = URL.createObjectURL(file);

                preview.classList.remove('d-none');

            }

        }
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
