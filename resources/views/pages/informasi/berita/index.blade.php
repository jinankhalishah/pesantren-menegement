@extends('layout.appadmin')

@section('content')

<div class="mb-4">
    <h3 class="fw-semibold">
        Data Berita
    </h3>

    <p class="text-muted mb-0">
        Kelola berita Pondok Pesantren
    </p>
</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <form action="{{ route('berita.index') }}" method="GET" class="w-50">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari judul berita..."
                        value="{{ request('search') }}">

                    <button class="btn btn-success">
                        <i class="bi bi-search"></i>
                    </button>

                </div>

            </form>

            <a href="{{ route('berita.create') }}" class="btn btn-success">

                <i class="bi bi-plus-circle me-1"></i>

                Tambah Berita

            </a>

        </div>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead class="table-light">

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th width="120">
                            Gambar
                        </th>

                        <th>
                            Judul
                        </th>

                        <th width="250">
                            Ringkasan
                        </th>

                        <th width="130">
                            Tanggal
                        </th>

                        <th width="140" class="text-center">
                            Aksi
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

                            @if($item->gambar)

                                <img
                                    src="{{ asset('uploads/berita/'.$item->gambar) }}"
                                    class="img-thumbnail"
                                    style="width:90px;height:60px;object-fit:cover;">

                            @else

                                <span class="text-muted">
                                    Tidak ada
                                </span>

                            @endif

                        </td>

                        <td>

                            <strong>
                                {{ $item->judul }}
                            </strong>

                        </td>

                        <td>

                            {{ Str::limit($item->ringkasan,60) }}

                        </td>

                        <td>

                            {{ $item->created_at->format('d M Y') }}

                        </td>

                        <td class="text-center">

                            <a href="{{ route('berita.edit',$item->id) }}"
                                class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form
                                action="{{ route('berita.destroy',$item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus berita ini?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center text-muted py-4">

                            Belum ada data berita

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
