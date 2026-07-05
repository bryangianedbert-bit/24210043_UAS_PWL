@extends('layouts.app')

@section('title', 'Isi Mata Kuliah KRS - SIAKAD')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h4 class="fw-bold mb-1" style="color: var(--primary-color);">
            <i class="bi bi-journal-check me-2"></i>
            Detail Kartu Rencana Studi
        </h4>

        <p class="text-muted mb-0">
            Kelola daftar mata kuliah yang diambil mahasiswa.
        </p>
    </div>

    <a href="{{ route('krs.index') }}" class="btn btn-light shadow-sm">
        <i class="bi bi-arrow-left me-2"></i>
        Kembali
    </a>

</div>


<div class="card shadow-soft border-0 mb-4">

    <div class="card-header bg-white border-0 py-3">
        <h5 class="fw-bold text-primary mb-0">
            <i class="bi bi-person-vcard me-2"></i>
            Informasi Mahasiswa
        </h5>
    </div>

    <div class="card-body">

        @if($krs_aktif)

        <div class="row">

            <div class="col-md-6">

                <table class="table table-borderless mb-0">

                    <tr>
                        <td width="35%" class="text-muted">NIM</td>
                        <td><strong>{{ $krs_aktif->mahasiswa->nim }}</strong></td>
                    </tr>

                    <tr>
                        <td class="text-muted">Mahasiswa</td>
                        <td><strong>{{ $krs_aktif->mahasiswa->nama_mahasiswa }}</strong></td>
                    </tr>

                    <tr>
                        <td class="text-muted">Semester</td>
                        <td><strong>{{ $krs_aktif->semester }}</strong></td>
                    </tr>

                    <tr>
                        <td class="text-muted">Tahun Akademik</td>
                        <td><strong>{{ $krs_aktif->tahun_akademik }}</strong></td>
                    </tr>

                </table>

            </div>

        </div>

        @else

        <div class="alert alert-info mb-0">

            <i class="bi bi-info-circle-fill me-2"></i>

            Menampilkan seluruh Detail KRS. Pilih salah satu KRS untuk melihat data mahasiswa tertentu.

        </div>

        @endif

    </div>

</div>



<div class="card shadow-soft border-0">

    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">

        <h5 class="fw-bold text-primary mb-0">

            <i class="bi bi-list-check me-2"></i>

            Daftar Mata Kuliah

        </h5>

        <a href="{{ route('detail_krs.create', ['krs_id' => request('krs_id')]) }}"
            class="btn btn-primary-custom shadow-sm">

            <i class="bi bi-plus-circle me-2"></i>

            Tambah Mata Kuliah

        </a>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-custom align-middle mb-0">

                <thead>

                <tr>

                    <th width="5%">No</th>

                    <th width="15%">Kode MK</th>

                    <th>Nama Mata Kuliah</th>

                    <th width="10%" class="text-center">SKS</th>

                    <th width="15%" class="text-center">Aksi</th>

                </tr>

                </thead>

                <tbody>

                @php
                    $total_sks = 0;
                @endphp

                @forelse($detail_krs as $index => $item)

                    @php
                        $total_sks += $item->mataKuliah->sks ?? 0;
                    @endphp

                    <tr>

                        <td class="fw-bold text-muted">
                            {{ $detail_krs->firstItem() + $index }}
                        </td>

                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $item->mataKuliah->kode_mk ?? '-' }}
                            </span>
                        </td>

                        <td>

                            {{ $item->mataKuliah->nama_mk ?? '-' }}

                        </td>

                        <td class="text-center">

                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">

                                {{ $item->mataKuliah->sks ?? 0 }}

                            </span>

                        </td>

                        <td class="text-center">

                            <a href="{{ route('detail_krs.edit',$item->id) }}"
                                class="btn btn-light text-warning action-btn shadow-sm">

                                <i class="bi bi-pencil-fill"></i>

                            </a>

                            <form
                                action="{{ route('detail_krs.destroy',$item->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin membatalkan mata kuliah ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-light text-danger action-btn shadow-sm">

                                    <i class="bi bi-trash-fill"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center py-5 text-muted">

                            <i class="bi bi-journal-x fs-2 d-block mb-2"></i>

                            Belum ada mata kuliah yang dipilih.

                        </td>

                    </tr>

                @endforelse

                </tbody>

                @if($detail_krs->count())

                <tfoot>

                    <tr>

                        <th colspan="3" class="text-end">

                            Total SKS

                        </th>

                        <th class="text-center">

                            <span class="badge bg-success fs-6">

                                {{ $total_sks }}

                            </span>

                        </th>

                        <th></th>

                    </tr>

                </tfoot>

                @endif

            </table>

        </div>

        <div class="mt-4">

            {{ $detail_krs->appends(request()->query())->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection