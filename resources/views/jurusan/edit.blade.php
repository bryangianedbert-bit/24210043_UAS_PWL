@extends('layouts.app')

@section('title', 'Edit Jurusan')

@section('content')

<div class="card shadow-soft border-0 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h3 class="fw-bold mb-1" style="color: var(--primary-color);">

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Jurusan

                </h3>

                <p class="text-muted mb-0">

                    Perbarui data jurusan yang telah tersimpan pada sistem.

                </p>

            </div>

            <a href="{{ route('jurusan.index') }}" class="btn btn-outline-secondary mt-3 mt-md-0">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali

            </a>

        </div>

    </div>

</div>

<div class="card shadow-soft border-0">

    <div class="card-body p-4 p-lg-5">

        <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-md-4">

                    <label class="form-label">

                        Kode Jurusan <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="kode_jurusan"
                        value="{{ old('kode_jurusan', $jurusan->kode_jurusan) }}"
                        class="form-control @error('kode_jurusan') is-invalid @enderror"
                        placeholder="Masukkan kode jurusan">

                    @error('kode_jurusan')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="col-md-8">

                    <label class="form-label">

                        Nama Jurusan <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="nama_jurusan"
                        value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                        class="form-control @error('nama_jurusan') is-invalid @enderror"
                        placeholder="Masukkan nama jurusan">

                    @error('nama_jurusan')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

            </div>

            <hr class="my-5">

            <div class="d-flex justify-content-end gap-3">

                <a href="{{ route('jurusan.index') }}" class="btn btn-outline-secondary">

                    <i class="bi bi-arrow-left me-2"></i>

                    Batal

                </a>

                <button type="submit" class="btn btn-primary-custom">

                    <i class="bi bi-check-circle me-2"></i>

                    Update Data

                </button>

            </div>

        </form>

    </div>

</div>

@endsection