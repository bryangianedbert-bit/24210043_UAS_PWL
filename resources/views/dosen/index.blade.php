@extends('layouts.app')

@section('title', 'Data Dosen')

@section('content')

<div class="card shadow-soft border-0 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h3 class="fw-bold mb-1" style="color: var(--primary-color);">
                    <i class="bi bi-person-workspace me-2"></i>
                    Data Dosen
                </h3>

                <p class="text-muted mb-0">
                    Kelola seluruh data dosen yang terdaftar pada sistem akademik.
                </p>

            </div>

            <a href="{{ route('dosen.create') }}" class="btn btn-primary-custom mt-3 mt-md-0">

                <i class="bi bi-plus-circle me-2"></i>

                Tambah Dosen

            </a>

        </div>

    </div>

</div>

<div class="card shadow-soft border-0">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-custom align-middle">

                <thead>

                    <tr>

                        <th width="8%">No</th>

                        <th>NIDN</th>

                        <th>Nama Dosen</th>

                        <th>Jurusan Homebase</th>

                        <th width="15%" class="text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($dosens as $index => $item)

                        <tr>

                            <td>

                                {{ $dosens->firstItem()+$index }}

                            </td>

                            <td>

                                <strong>

                                    {{ $item->nidn }}

                                </strong>

                            </td>

                            <td>

                                {{ $item->nama_dosen }}

                            </td>

                            <td>

                                <span class="badge bg-primary-subtle text-primary">

                                    {{ $item->jurusan->nama_jurusan ?? '-' }}

                                </span>

                            </td>

                            <td class="text-center">

                                <a href="{{ route('dosen.edit',$item->id) }}"

                                    class="btn btn-warning btn-sm action-btn"

                                    title="Edit">

                                    <i class="bi bi-pencil-fill"></i>

                                </a>

                                <form
                                    action="{{ route('dosen.destroy',$item->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm action-btn"
                                        title="Hapus">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-5">

                                <i class="bi bi-person-x fs-1 d-block text-secondary mb-3"></i>

                                <strong class="text-secondary">

                                    Data dosen belum tersedia

                                </strong>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4">

            {{ $dosens->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection