@extends('layouts.app')

@section('title', 'Tambah Kelas')

@section('content')

<div class="card shadow-soft border-0 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h3 class="fw-bold mb-1" style="color: var(--primary-color);">

                    <i class="bi bi-door-open-fill me-2"></i>

                    Tambah Kelas

                </h3>

                <p class="text-muted mb-0">

                    Buat kelas baru dan tentukan mata kuliah beserta dosen pengampunya.

                </p>

            </div>

            <a href="{{ route('kelas.index') }}" class="btn btn-outline-secondary mt-3 mt-md-0">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali

            </a>

        </div>

    </div>

</div>

<div class="card shadow-soft border-0">

    <div class="card-body p-4 p-lg-5">

        <form action="{{ route('kelas.store') }}" method="POST">

            @csrf

            <div class="row g-4">

                <div class="col-12">

                    <label class="form-label">

                        Nama Kelas <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="nama_kelas"
                        value="{{ old('nama_kelas') }}"
                        class="form-control @error('nama_kelas') is-invalid @enderror"
                        placeholder="Contoh : TI-4A">

                    @error('nama_kelas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6">

                    <label class="form-label">

                        Mata Kuliah <span class="text-danger">*</span>

                    </label>

                    <select
                        name="mata_kuliah_id"
                        class="form-select @error('mata_kuliah_id') is-invalid @enderror">

                        <option value="">Pilih Mata Kuliah</option>

                        @foreach($mata_kuliahs as $mk)

                            <option
                                value="{{ $mk->id }}"
                                {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>

                                {{ $mk->kode_mk }} - {{ $mk->nama_mk }}

                            </option>

                        @endforeach

                    </select>

                    @error('mata_kuliah_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6">

                    <label class="form-label">

                        Dosen Pengampu <span class="text-danger">*</span>

                    </label>

                    <select
                        name="dosen_id"
                        class="form-select @error('dosen_id') is-invalid @enderror">

                        <option value="">Pilih Dosen</option>

                        @foreach($dosens as $dsn)

                            <option
                                value="{{ $dsn->id }}"
                                {{ old('dosen_id') == $dsn->id ? 'selected' : '' }}>

                                {{ $dsn->nama_dosen }}

                            </option>

                        @endforeach

                    </select>

                    @error('dosen_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <hr class="my-5">

            <div class="d-flex justify-content-end gap-3">

                <button type="reset" class="btn btn-outline-secondary">

                    <i class="bi bi-arrow-clockwise me-2"></i>

                    Reset

                </button>

                <button type="submit" class="btn btn-primary-custom">

                    <i class="bi bi-check-circle me-2"></i>

                    Simpan Kelas

                </button>

            </div>

        </form>

    </div>

</div>

@endsection