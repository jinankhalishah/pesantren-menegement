@extends ('layout.app')

@section('content')
    <div class="container-fluid min-vh-100 bg-light">
        <div class="row min-vh-100">

            {{-- LEFT : LOGIN --}}
            <div class="col-lg-7 d-flex align-items-center justify-content-center">
                <div class="card shadow border-0 w-100" style="max-width:420px">
                    <div class="card-body p-4 p-md-5">

                        <div class="text-center mb-4">
                            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width:64px;height:64px">
                                <i class="bi bi-lock fs-4"></i>
                            </div>
                            <h4 class="fw-bold mb-1">Sistem Informasi Ponpes</h4>
                            <p class="text-muted mb-0">Pondok Pesantren Al-Hikmah</p>
                        </div>

                        <form method="POST" action="/login">
                            @csrf

                            @error('login')
                                <div class="alert alert-danger d-flex align-items-center">
                                    <i class="bi bi-exclamation-circle me-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-person text-success"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan email"
                                        required value="{{ old('email') }}"required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-lock text-success"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukkan password" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label text-muted">
                                        Ingat saya
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-success w-100 py-2 fw-semibold">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                            </button>
                        </form>

                        <div class="text-center text-muted small mt-4">
                            © 2026 Pondok Pesantren Al-Hikmah
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT : IMAGE --}}
            <div class="col-lg-5 d-none d-lg-flex align-items-center position-relative p-0">

                <img src="https://images.unsplash.com/photo-1600383963284-91ef78fc9b6d"
                    class="w-100 h-100 object-fit-cover">

                <div class="position-absolute top-0 start-0 w-100 h-100 bg-success opacity-75"></div>

                <div class="position-absolute top-50 start-50 translate-middle text-white text-center px-4">
                    <h3 class="fw-bold mb-2">Selamat Datang</h3>
                    <p class="text-white-50 mb-4">
                        Sistem Informasi Manajemen Pesantren
                    </p>

                    <div class="row g-3">
                        <div class="col-4">
                            <div class="bg-white bg-opacity-10 rounded p-2">
                                <strong>450+</strong><br>
                                <small>Santri</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-white bg-opacity-10 rounded p-2">
                                <strong>45+</strong><br>
                                <small>Ustadz</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-white bg-opacity-10 rounded p-2">
                                <strong>40+</strong><br>
                                <small>Tahun</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
