@extends('layouts.app')

@section('title', 'Data Kartu Rencana Studi')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

    <div>

        <h4 class="fw-bold mb-1" style="color: var(--primary-color);">

            <i class="bi bi-file-earmark-text-fill me-2"></i>

            Data Kartu Rencana Studi

        </h4>

        <p class="text-muted mb-0">

            Kelola data KRS mahasiswa serta detail mata kuliah yang diambil.

        </p>

    </div>

    <a href="{{ route('krs.create') }}" class="btn btn-primary-custom shadow-sm mt-3 mt-md-0">

        <i class="bi bi-plus-circle me-2"></i>

        Buat KRS

    </a>

</div>

<div class="card shadow-soft border-0">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-custom align-middle mb-0">

                <thead>

                    <tr>

                        <th width="5%">No</th>

                        <th width="15%">NIM</th>

                        <th>Mahasiswa</th>

                        <th width="12%" class="text-center">Semester</th>

                        <th width="15%" class="text-center">Tahun Akademik</th>

                        <th width="28%" class="text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($krs as $index => $item)

                    <tr>

                        <td class="fw-bold text-muted">

                            {{ $krs->firstItem() + $index }}

                        </td>

                        <td>

                            <span class="fw-semibold">

                                {{ $item->mahasiswa->nim ?? '-' }}

                            </span>

                        </td>

                        <td>

                            {{ $item->mahasiswa->nama_mahasiswa ?? '-' }}

                        </td>

                        <td class="text-center">

                            <span class="badge bg-primary">

                                Semester {{ $item->semester }}

                            </span>

                        </td>

                        <td class="text-center">

                            {{ $item->tahun_akademik }}

                        </td>

                        <td class="text-center">

                            <a href="{{ route('krs.cetak',$item->id) }}"
                               target="_blank"
                               class="btn btn-sm btn-outline-dark me-1">

                                <i class="bi bi-printer"></i>

                            </a>

                            <a href="{{ route('detail_krs.index',['krs_id'=>$item->id]) }}"
                               class="btn btn-sm btn-outline-primary me-1">

                                <i class="bi bi-list-check"></i>

                            </a>

                            <a href="{{ route('krs.edit',$item->id) }}"
                               class="btn btn-sm btn-outline-warning me-1">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form
                                action="{{ route('krs.destroy',$item->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Menghapus KRS juga akan menghapus seluruh detail mata kuliah. Lanjutkan?')">

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

                        <td colspan="6" class="text-center py-5 text-muted">

                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>

                            Belum ada data KRS.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4">

            {{ $krs->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection