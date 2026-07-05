@extends('layouts.app')

@section('title', 'Edit Mata Kuliah')

@section('content')

<div class="card shadow-soft border-0 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h3 class="fw-bold mb-1" style="color: var(--primary-color);">

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Mata Kuliah

                </h3>

                <p class="text-muted mb-0">

                    Perbarui informasi mata kuliah yang tersimpan pada sistem akademik.

                </p>

            </div>

            <a href="{{ route('mata_kuliah.index') }}" class="btn btn-outline-secondary mt-3 mt-md-0">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali

            </a>

        </div>

    </div>

</div>

<div class="card shadow-soft border-0">

    <div class="card-body p-4 p-lg-5">

        <form action="{{ route('mata_kuliah.update', $mataKuliah->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-md-3">

                    <label class="form-label">

                        Kode MK <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="kode_mk"
                        value="{{ old('kode_mk', $mataKuliah->kode_mk) }}"
                        class="form-control @error('kode_mk') is-invalid @enderror"
                        placeholder="Masukkan kode mata kuliah">

                    @error('kode_mk')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="col-md-7">

                    <label class="form-label">

                        Nama Mata Kuliah <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="nama_mk"
                        value="{{ old('nama_mk', $mataKuliah->nama_mk) }}"
                        class="form-control @error('nama_mk') is-invalid @enderror"
                        placeholder="Masukkan nama mata kuliah">

                    @error('nama_mk')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="col-md-2">

                    <label class="form-label">

                        SKS <span class="text-danger">*</span>

                    </label>

                    <input
                        type="number"
                        name="sks"
                        value="{{ old('sks', $mataKuliah->sks) }}"
                        class="form-control @error('sks') is-invalid @enderror"
                        min="1"
                        max="6">

                    @error('sks')

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
                                {{ old('jurusan_id', $mataKuliah->jurusan_id) == $jur->id ? 'selected' : '' }}>

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

                <a href="{{ route('mata_kuliah.index') }}" class="btn btn-outline-secondary">

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