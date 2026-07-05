@extends('layouts.app')

@section('title', 'Data Mahasiswa - SIAKAD')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-0 fw-bold" style="color: var(--primary-color);">Data Mahasiswa</h4>
        <p class="text-muted small mb-0">Kelola informasi data induk mahasiswa.</p>
    </div>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary-custom shadow-sm px-4">
        <i class="bi bi-plus-lg me-2"></i> Tambah Data
    </a>
</div>

<div class="card shadow-soft border-0 mb-4">
    <div class="card-body p-4">
        
        <div class="row mb-4">
            <div class="col-md-5">
                <form action="{{ route('mahasiswa.index') }}" method="GET">
                    <div class="input-group shadow-sm" style="border-radius: 8px; overflow: hidden;">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Cari NIM atau Nama..." value="{{ $search ?? '' }}">
                        <button class="btn btn-primary-custom px-4" type="submit">Cari</button>
                        @if(isset($search))
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-danger"><i class="bi bi-x-lg"></i></a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jurusan</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswas as $index => $item)
                        <tr>
                            <td class="text-muted fw-bold">{{ $mahasiswas->firstItem() + $index }}</td>
                            <td class="fw-bold">{{ $item->nim }}</td>
                            <td>{{ $item->nama_mahasiswa }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $item->jurusan->nama_jurusan ?? '-' }}</span></td>
                            <td class="text-center">
                                <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-light text-warning action-btn shadow-sm" title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light text-danger action-btn shadow-sm" title="Hapus">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-2 d-block mb-2"></i> Data mahasiswa tidak ditemukan.
                            </td>
                        </tr>
                    @endempty
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $mahasiswas->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection