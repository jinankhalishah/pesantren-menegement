@extends('layout.appadmin')

@section('content')

<div class="mb-4">

    <h3 class="fw-semibold">
        Visi & Misi
    </h3>

    <p class="text-muted mb-0">
        Kelola visi dan misi pondok pesantren
    </p>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white border-0 p-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="fw-semibold mb-1">
                    Data Visi & Misi
                </h5>

                <small class="text-muted">
                    Informasi yang ditampilkan pada halaman website
                </small>

            </div>

            <a href="{{ route('visi-misi.edit') }}"
                class="btn btn-primary rounded-3">

                <i class="bi bi-pencil-square me-1"></i>

                Edit

            </a>

        </div>

    </div>

    <div class="card-body p-4">

        <div class="mb-4">

            <h5 class="fw-semibold text-success">

                Visi

            </h5>

            <div class="border rounded-3 p-3 bg-light">

                {{ $data->visi ?? '-' }}

            </div>

        </div>

        <div>

            <h5 class="fw-semibold text-success">

                Misi

            </h5>

            <div class="border rounded-3 p-3 bg-light">

                @if($data)

                    <ol class="mb-0">

                        @foreach(explode("\n", $data->misi) as $misi)

                            @if(trim($misi) != '')

                                <li class="mb-2">

                                    {{ trim($misi) }}

                                </li>

                            @endif

                        @endforeach

                    </ol>

                @else

                    -

                @endif

            </div>

        </div>

    </div>

</div>

@endsection
