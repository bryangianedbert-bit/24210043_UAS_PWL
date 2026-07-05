@extends('layouts.app')

@section('title', 'Edit KRS - SIAKAD')

@section('content')

<div class="d-flex align-items-center mb-4">

    <a href="{{ route('krs.index') }}" class="btn btn-light shadow-sm me-3">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div>
        <h4 class="fw-bold mb-1" style="color: var(--primary-color);">
            <i class="bi bi-pencil-square me-2"></i>
            Edit Kartu Rencana Studi
        </h4>
        <p class="text-muted mb-0">
            Perbarui informasi administrasi KRS mahasiswa.
        </p>
    </div>

</div>


<div class="card shadow-soft border-0">

    <div class="card-header bg-white border-0 py-3">
        <h5 class="fw-bold mb-0 text-primary">
            <i class="bi bi-journal-text me-2"></i>
            Informasi KRS
        </h5>
    </div>

    <div class="card-body p-4 p-md-5">

        <form action="{{ route('krs.update', $krs->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="form-label">
                    <i class="bi bi-person-fill me-2"></i>
                    Mahasiswa
                </label>

                <select
                    name="mahasiswa_id"
                    class="form-select form-select-lg @error('mahasiswa_id') is-invalid @enderror">

                    <option value="">-- Pilih Mahasiswa --</option>

                    @foreach($mahasiswas as $mhs)

                        <option
                            value="{{ $mhs->id }}"
                            {{ old('mahasiswa_id',$krs->mahasiswa_id)==$mhs->id ? 'selected' : '' }}>

                            {{ $mhs->nim }} - {{ $mhs->nama_mahasiswa }}

                        </option>

                    @endforeach

                </select>

                @error('mahasiswa_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>


            <div class="row">

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        <i class="bi bi-calendar3 me-2"></i>
                        Semester
                    </label>

                    <select
                        name="semester"
                        class="form-select form-select-lg @error('semester') is-invalid @enderror">

                        <option value="">-- Pilih Semester --</option>

                        <option value="Ganjil"
                            {{ old('semester',$krs->semester)=='Ganjil' ? 'selected' : '' }}>
                            Ganjil
                        </option>

                        <option value="Genap"
                            {{ old('semester',$krs->semester)=='Genap' ? 'selected' : '' }}>
                            Genap
                        </option>

                        <option value="Pendek"
                            {{ old('semester',$krs->semester)=='Pendek' ? 'selected' : '' }}>
                            Pendek
                        </option>

                    </select>

                    @error('semester')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>


                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        <i class="bi bi-calendar-range me-2"></i>
                        Tahun Akademik
                    </label>

                    <input
                        type="text"
                        name="tahun_akademik"
                        class="form-control form-control-lg @error('tahun_akademik') is-invalid @enderror"
                        value="{{ old('tahun_akademik',$krs->tahun_akademik) }}"
                        placeholder="Contoh : 2026/2027">

                    @error('tahun_akademik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

            </div>

            <hr>

            <div class="d-flex justify-content-end gap-3">

                <a href="{{ route('krs.index') }}" class="btn btn-light px-4">
                    <i class="bi bi-x-circle me-1"></i>
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-warning text-white px-5 shadow-sm fw-bold">

                    <i class="bi bi-check-circle-fill me-2"></i>
                    Perbarui KRS

                </button>

            </div>

        </form>

    </div>

</div>

@endsection