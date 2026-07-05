@extends('layouts.app')

@section('title', 'Buat KRS Baru - SIAKAD')

@section('content')

<div class="d-flex align-items-center mb-4">
    <a href="{{ route('krs.index') }}" class="btn btn-light shadow-sm me-3">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div>
        <h4 class="fw-bold mb-1" style="color: var(--primary-color);">
            <i class="bi bi-journal-check me-2"></i>Buat Kartu Rencana Studi
        </h4>
        <p class="text-muted mb-0">
            Registrasikan mahasiswa untuk membuat lembar KRS semester baru.
        </p>
    </div>
</div>

<div class="card shadow-soft border-0">

    <div class="card-header bg-white border-0 py-3">
        <h5 class="mb-0 fw-bold text-primary">
            <i class="bi bi-person-vcard me-2"></i>
            Informasi KRS
        </h5>
    </div>

    <div class="card-body p-4 p-md-5">

        <form action="{{ route('krs.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label">
                    <i class="bi bi-person-fill me-2"></i>
                    Mahasiswa
                </label>

                <select name="mahasiswa_id"
                    class="form-select form-select-lg @error('mahasiswa_id') is-invalid @enderror">

                    <option value="">-- Pilih Mahasiswa --</option>

                    @foreach($mahasiswas as $mhs)
                        <option value="{{ $mhs->id }}"
                            {{ old('mahasiswa_id') == $mhs->id ? 'selected' : '' }}>
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

                    <select name="semester"
                        class="form-select form-select-lg @error('semester') is-invalid @enderror">

                        <option value="">-- Pilih Semester --</option>

                        <option value="Ganjil"
                            {{ old('semester')=='Ganjil' ? 'selected' : '' }}>
                            Ganjil
                        </option>

                        <option value="Genap"
                            {{ old('semester')=='Genap' ? 'selected' : '' }}>
                            Genap
                        </option>

                        <option value="Pendek"
                            {{ old('semester')=='Pendek' ? 'selected' : '' }}>
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
                        value="{{ old('tahun_akademik') }}"
                        class="form-control form-control-lg @error('tahun_akademik') is-invalid @enderror"
                        placeholder="Contoh : 2026/2027">

                    @error('tahun_akademik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

            </div>

            <hr>

            <div class="d-flex justify-content-end gap-3">

                <button type="reset" class="btn btn-light px-4">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>
                    Reset
                </button>

                <button type="submit" class="btn btn-primary-custom px-5 shadow-sm">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Simpan KRS
                </button>

            </div>

        </form>

    </div>

</div>

@endsection