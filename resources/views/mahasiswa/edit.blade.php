@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')

<div class="card shadow-soft border-0 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h3 class="fw-bold mb-1" style="color: var(--primary-color);">
                    <i class="bi bi-pencil-square me-2"></i>
                    Edit Mahasiswa
                </h3>

                <p class="text-muted mb-0">
                    Perbarui informasi mahasiswa yang tersimpan pada sistem.
                </p>

            </div>

            <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary mt-3 mt-md-0">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali

            </a>

        </div>

    </div>

</div>

<div class="card shadow-soft border-0">

    <div class="card-body p-4 p-lg-5">

        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-md-6">

                    <label class="form-label">

                        NIM <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="nim"
                        class="form-control @error('nim') is-invalid @enderror"
                        value="{{ old('nim', $mahasiswa->nim) }}"
                        placeholder="Masukkan NIM">

                    @error('nim')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="col-md-6">

                    <label class="form-label">

                        Nama Mahasiswa <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="nama_mahasiswa"
                        class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                        value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}"
                        placeholder="Masukkan nama mahasiswa">

                    @error('nama_mahasiswa')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="col-12">

                    <label class="form-label">

                        Jurusan <span class="text-danger">*</span>

                    </label>

                    <select
                        name="jurusan_id"
                        class="form-select @error('jurusan_id') is-invalid @enderror">

                        <option value="">Pilih Jurusan</option>

                        @foreach($jurusans as $jur)

                            <option
                                value="{{ $jur->id }}"
                                {{ old('jurusan_id', $mahasiswa->jurusan_id) == $jur->id ? 'selected' : '' }}>

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

                <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary">

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