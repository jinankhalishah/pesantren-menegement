@extends('layout.app')

@section('content')

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article>

                    @if($berita->gambar)
                        <img src="{{ asset('uploads/berita/'.$berita->gambar) }}"
                            class="img-fluid rounded-3 w-100 mb-4"
                            alt="{{ $berita->judul }}"
                            style="max-height:400px;object-fit:cover;">
                    @endif

                    <small class="text-muted">
                        {{ $berita->created_at->format('d M Y') }}
                    </small>

                    <h1 class="fw-bold mt-2">
                        {{ $berita->judul }}
                    </h1>

                    <p class="lead text-muted">
                        {{ $berita->ringkasan }}
                    </p>

                    <hr>

                    <div class="berita-isi">
                        {!! $berita->isi !!}
                    </div>

                </article>
            </div>
        </div>
    </div>
</section>

@endsection