@extends('layout.appadmin')

@section('content')

<div class="mb-4">

    <h3 class="fw-semibold">
        Edit Berita
    </h3>

    <p class="text-muted mb-0">
        Perbarui informasi berita pondok pesantren
    </p>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="{{ route('berita.update', $berita->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                {{-- Judul --}}
                <div class="col-lg-8 mb-4">

                    <label class="form-label fw-semibold">
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $berita->judul) }}">

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

                    <input
                        type="file"
                        name="gambar"
                        id="gambar"
                        class="form-control">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </small>

                </div>

            </div>

            {{-- Preview Gambar --}}
            <div class="mb-4">

                @if($berita->gambar)

                    <img
                        id="preview"
                        src="{{ asset('storage/'.$berita->gambar) }}"
                        class="img-fluid rounded shadow-sm"
                        style="max-height:250px;">

                @else

                    <img
                        id="preview"
                        src=""
                        class="img-fluid rounded shadow-sm d-none"
                        style="max-height:250px;">

                @endif

            </div>

            {{-- Ringkasan --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Ringkasan
                </label>

                <textarea
                    name="ringkasan"
                    rows="3"
                    class="form-control">{{ old('ringkasan', $berita->ringkasan) }}</textarea>

            </div>

            {{-- Isi --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Isi Berita
                </label>

                <textarea
                    id="editor"
                    name="isi">{{ old('isi', $berita->isi) }}</textarea>

            </div>

            <div class="d-flex gap-2">

                <button type="submit" class="btn btn-success">

                    <i class="bi bi-check-circle me-1"></i>

                    Update Berita

                </button>

                <a href="{{ route('berita.index') }}"
                   class="btn btn-secondary">

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

    if(file){

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
