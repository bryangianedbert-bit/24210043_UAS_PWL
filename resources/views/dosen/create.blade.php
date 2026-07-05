@extends('layouts.app')

@section('title', 'Tambah Dosen')

@section('content')

<div class="card shadow-soft border-0 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h3 class="fw-bold mb-1" style="color: var(--primary-color);">
                    <i class="bi bi-person-plus-fill me-2"></i>
                    Tambah Dosen
                </h3>

                <p class="text-muted mb-0">
                    Lengkapi data dosen sebelum disimpan ke dalam sistem akademik.
                </p>

            </div>

            <a href="{{ route('dosen.index') }}" class="btn btn-outline-secondary mt-3 mt-md-0">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali

            </a>

        </div>

    </div>

</div>

<div class="card shadow-soft border-0">

    <div class="card-body p-4 p-lg-5">

        <form action="{{ route('dosen.store') }}" method="POST">

            @csrf

            <div class="row g-4">

                <div class="col-md-4">

                    <label class="form-label">

                        NIDN <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="nidn"
                        value="{{ old('nidn') }}"
                        class="form-control @error('nidn') is-invalid @enderror"
                        placeholder="Masukkan NIDN">

                    @error('nidn')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="col-md-8">

                    <label class="form-label">

                        Nama Dosen <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="nama_dosen"
                        value="{{ old('nama_dosen') }}"
                        class="form-control @error('nama_dosen') is-invalid @enderror"
                        placeholder="Masukkan nama dosen">

                    @error('nama_dosen')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="col-12">

                    <label class="form-label">

                        Jurusan Homebase <span class="text-danger">*</span>

                    </label>

                    <select
                        name="jurusan_id"
                        class="form-select @error('jurusan_id') is-invalid @enderror">

                        <option value="">Pilih Jurusan</option>

                        @foreach($jurusans as $jur)

                            <option
                                value="{{ $jur->id }}"
                                {{ old('jurusan_id') == $jur->id ? 'selected' : '' }}>

                                {{ $jur->nama_jurusan }}

                            </option>

                        @endforeach

                    </select>

                    @error('jurusan_id')

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

                    Simpan Data

                </button>

            </div>

        </form>

    </div>

</div>

@endsection