@extends('layouts.app')

@section('title', 'Data Kelas - SIAKAD')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

    <div>

        <h4 class="fw-bold mb-1" style="color: var(--primary-color);">

            <i class="bi bi-door-open-fill me-2"></i>

            Data Kelas

        </h4>

        <p class="text-muted mb-0">

            Kelola pembagian kelas beserta mata kuliah dan dosen pengampu.

        </p>

    </div>

    <a href="{{ route('kelas.create') }}" class="btn btn-primary-custom shadow-sm mt-3 mt-md-0">

        <i class="bi bi-plus-circle me-2"></i>

        Tambah Kelas

    </a>

</div>

<div class="card shadow-soft border-0">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-custom align-middle mb-0">

                <thead>

                    <tr>

                        <th width="6%">No</th>

                        <th width="15%">Kelas</th>

                        <th>Mata Kuliah</th>

                        <th>Dosen Pengampu</th>

                        <th width="15%" class="text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($kelas as $index => $item)

                    <tr>

                        <td class="fw-bold text-muted">

                            {{ $kelas->firstItem() + $index }}

                        </td>

                        <td>

                            <span class="badge rounded-pill bg-primary px-3 py-2">

                                {{ $item->nama_kelas }}

                            </span>

                        </td>

                        <td>

                            <div class="fw-semibold">

                                {{ $item->mataKuliah->nama_mk ?? '-' }}

                            </div>

                            <small class="text-muted">

                                {{ $item->mataKuliah->kode_mk ?? '-' }}

                            </small>

                        </td>

                        <td>

                            <i class="bi bi-person-workspace me-2 text-primary"></i>

                            {{ $item->dosen->nama_dosen ?? '-' }}

                        </td>

                        <td class="text-center">

                            <a href="{{ route('kelas.edit',$item->id) }}"
                               class="btn btn-sm btn-outline-warning me-1">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form
                                action="{{ route('kelas.destroy',$item->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center py-5 text-muted">

                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>

                            Belum ada data kelas.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4">

            {{ $kelas->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection