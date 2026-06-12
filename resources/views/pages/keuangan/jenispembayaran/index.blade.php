@extends('layout.appadmin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Jenis Pembayaran
            </h3>

            <p class="text-muted mb-0">
                Kelola jenis pembayaran pesantren
            </p>
        </div>

        <a href="{{ route('jenis-pembayaran.create') }}" class="btn btn-success rounded-3">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah Data

        </a>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="80">
                                No
                            </th>

                            <th>
                                Nama Pembayaran
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Nominal
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)
                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->nama_pembayaran }}
                                </td>

                                <td>
                                    {{ $item->kategori }}
                                </td>

                                <td>

                                    Rp
                                    {{ number_format($item->nominal, 0, ',', '.') }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center py-4">

                                    Belum ada data

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
