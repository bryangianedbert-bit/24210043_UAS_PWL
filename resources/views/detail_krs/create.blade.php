@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah ke KRS - SIAKAD')

@section('content')
<div class="d-flex align-items-center mb-4">
    <a href="{{ route('detail_krs.index', ['krs_id' => $krs_id_selected]) }}" class="btn btn-light shadow-sm me-3">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div>
        <h4 class="mb-0 fw-bold" style="color: var(--primary-color);">
            Tambah Mata Kuliah ke KRS
        </h4>
        <p class="text-muted small mb-0">
            Tambahkan mata kuliah yang akan diambil mahasiswa pada semester ini.
        </p>
    </div>
</div>

<div class="card shadow-soft border-0">
    <div class="card-body p-4 p-md-5">
        <form action="{{ route('detail_krs.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label">
                    Pilih KRS Mahasiswa
                </label>

                <select name="krs_id"
                    class="form-select form-select-lg @error('krs_id') is-invalid @enderror"
                    style="font-size: .95rem;">

                    <option value="">-- Pilih KRS --</option>

                    @foreach($krs_list as $krs)
                        <option value="{{ $krs->id }}"
                            {{ (old('krs_id') ?? $krs_id_selected) == $krs->id ? 'selected' : '' }}>
                            {{ $krs->mahasiswa->nim }}
                            -
                            {{ $krs->mahasiswa->nama_mahasiswa }}
                            ({{ $krs->semester }} {{ $krs->tahun_akademik }})
                        </option>
                    @endforeach

                </select>

                @error('krs_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">
                    Mata Kuliah
                </label>

                <select name="mata_kuliah_id"
                    class="form-select form-select-lg @error('mata_kuliah_id') is-invalid @enderror"
                    style="font-size: .95rem;">

                    <option value="">-- Pilih Mata Kuliah --</option>

                    @foreach($mata_kuliahs as $mk)
                        <option value="{{ $mk->id }}"
                            {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                            {{ $mk->kode_mk }}
                            -
                            {{ $mk->nama_mk }}
                            ({{ $mk->sks }} SKS)
                        </option>
                    @endforeach

                </select>

                @error('mata_kuliah_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="text-muted opacity-25 my-4">

            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('detail_krs.index', ['krs_id' => $krs_id_selected]) }}"
                    class="btn btn-light px-4">
                    Batal
                </a>

                <button type="submit"
                    class="btn btn-primary-custom px-5 shadow-sm">
                    Simpan Mata Kuliah
                </button>
            </div>

        </form>
    </div>
</div>
@endsection