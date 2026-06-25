@extends('layout.appadmin')

@section('content')

<div class="mb-4">

    <h3 class="fw-semibold">
        Program Unggulan
    </h3>

    <p class="text-muted mb-0">
        Kelola program unggulan pondok pesantren
    </p>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white border-0 p-4">

        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">

            <form action="" method="GET" class="w-100" style="max-width: 350px;">

                <div class="input-group">

                    <span class="input-group-text bg-white border-end-0">

                        <i class="bi bi-search text-muted"></i>

                    </span>

                    <input type="text"
                        name="search"
                        class="form-control border-start-0"
                        placeholder="Cari program..."
                        value="{{ request('search') }}">

                </div>

            </form>

            <a href="{{ route('program-unggulan.create') }}"
                class="btn btn-success rounded-3 px-4">

                <i class="bi bi-plus-lg me-1"></i>

                Tambah Program

            </a>

        </div>

    </div>

    <div class="table-responsive">

        <table class="table align-middle mb-0">

            <thead class="table-light">

                <tr>

                    <th class="px-4 py-3">
                        No
                    </th>

                    <th class="px-4 py-3">
                        Nama Program
                    </th>

                    <th class="px-4 py-3">
                        Level
                    </th>

                    <th class="px-4 py-3">
                        Status
                    </th>

                    <th class="px-4 py-3 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($data as $item)

                    <tr>

                        <td class="px-4 py-3">

                            {{ $loop->iteration }}

                        </td>

                        <td class="px-4 py-3">

                            <div class="fw-semibold">

                                {{ $item->nama_program }}

                            </div>

                            <small class="text-muted">

                                {{ Str::limit($item->deskripsi, 80) }}

                            </small>

                        </td>

                        <td class="px-4 py-3">

                            {{ $item->level }}

                        </td>

                        <td class="px-4 py-3">

                            @if($item->status)

                                <span class="badge bg-success">

                                    Aktif

                                </span>

                            @else

                                <span class="badge bg-secondary">

                                    Nonaktif

                                </span>

                            @endif

                        </td>

                        <td class="px-4 py-3 text-center">

                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('program-unggulan.edit',$item->id) }}"
                                    class="btn btn-sm btn-primary rounded-3">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <form action="{{ route('program-unggulan.destroy',$item->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus program ini?')"
                                        class="btn btn-sm btn-danger rounded-3">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-4">

                            Belum ada data program unggulan

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
