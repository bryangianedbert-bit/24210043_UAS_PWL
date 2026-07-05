@extends('layouts.app')

@section('title', 'Data Jurusan')

@section('content')

<div class="card shadow-soft border-0 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h3 class="fw-bold mb-1" style="color: var(--primary-color);">

                    <i class="bi bi-building-fill me-2"></i>

                    Data Jurusan

                </h3>

                <p class="text-muted mb-0">

                    Kelola seluruh data jurusan yang tersedia pada sistem akademik.

                </p>

            </div>

            <a href="{{ route('jurusan.create') }}" class="btn btn-primary-custom mt-3 mt-md-0">

                <i class="bi bi-plus-circle me-2"></i>

                Tambah Jurusan

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

                        <th width="25%">Kode Jurusan</th>

                        <th>Nama Jurusan</th>

                        <th width="15%" class="text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($jurusans as $index => $item)

                        <tr>

                            <td>

                                {{ $jurusans->firstItem()+$index }}

                            </td>

                            <td>

                                <span class="badge bg-primary-subtle text-primary">

                                    {{ $item->kode_jurusan }}

                                </span>

                            </td>

                            <td>

                                {{ $item->nama_jurusan }}

                            </td>

                            <td class="text-center">

                                <a href="{{ route('jurusan.edit',$item->id) }}"

                                    class="btn btn-warning btn-sm action-btn"

                                    title="Edit">

                                    <i class="bi bi-pencil-fill"></i>

                                </a>

                                <form
                                    action="{{ route('jurusan.destroy',$item->id) }}"
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

                            <td colspan="4" class="text-center py-5">

                                <i class="bi bi-building fs-1 d-block text-secondary mb-3"></i>

                                <strong class="text-secondary">

                                    Data jurusan belum tersedia

                                </strong>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4">

            {{ $jurusans->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection