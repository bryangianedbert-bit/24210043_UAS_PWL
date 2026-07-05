@extends('layouts.app')

@section('title', 'Isi Mata Kuliah KRS - SIAKAD')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0" style="color: var(--primary-color);">
            Detail Mata Kuliah KRS
        </h4>
        <p class="text-muted small mb-0">
            Kelola mata kuliah yang diambil mahasiswa.
        </p>
    </div>

    @if($krs_aktif)
    <a href="{{ route('detail_krs.create',['krs_id'=>$krs_aktif->id]) }}"
       class="btn btn-primary-custom shadow-sm px-4">
        <i class="bi bi-plus-lg me-2"></i>
        Tambah Mata Kuliah
    </a>
    @endif
</div>

@if($krs_aktif)
<div class="card shadow-soft border-0 mb-4">
    <div class="card-body">

        <div class="row">

            <div class="col-md-4">
                <small class="text-muted">NIM</small>
                <h6 class="fw-bold">{{ $krs_aktif->mahasiswa->nim }}</h6>
            </div>

            <div class="col-md-4">
                <small class="text-muted">Mahasiswa</small>
                <h6 class="fw-bold">{{ $krs_aktif->mahasiswa->nama_mahasiswa }}</h6>
            </div>

            <div class="col-md-4">
                <small class="text-muted">Semester</small>
                <h6 class="fw-bold">
                    {{ $krs_aktif->semester }}
                    |
                    {{ $krs_aktif->tahun_akademik }}
                </h6>
            </div>

        </div>

    </div>
</div>
@endif

<div class="card shadow-soft border-0">
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-custom mb-0">

                <thead>

                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">Aksi</th>
                </tr>

                </thead>

                <tbody>

                @php $total_sks=0; @endphp

                @forelse($detail_krs as $index=>$item)

                    @php
                        $total_sks += $item->mataKuliah->sks ?? 0;
                    @endphp

                    <tr>

                        <td>{{ $detail_krs->firstItem()+$index }}</td>

                        <td>{{ $item->mataKuliah->kode_mk }}</td>

                        <td>{{ $item->mataKuliah->nama_mk }}</td>

                        <td class="text-center">
                            <span class="badge bg-light text-dark border">
                                {{ $item->mataKuliah->sks }}
                            </span>
                        </td>

                        <td class="text-center">

                            <a href="{{ route('detail_krs.edit',$item->id) }}"
                               class="btn btn-light text-warning action-btn shadow-sm">

                                <i class="bi bi-pencil-fill"></i>

                            </a>

                            <form action="{{ route('detail_krs.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-light text-danger action-btn shadow-sm">

                                    <i class="bi bi-trash-fill"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-4 text-muted">

                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>

                            Belum ada mata kuliah.

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

                        {{ $total_sks }}

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

        <div class="mt-4">

            <a href="{{ route('krs.index') }}"
               class="btn btn-light">

                ← Kembali ke KRS

            </a>

        </div>

    </div>
</div>

@endsection