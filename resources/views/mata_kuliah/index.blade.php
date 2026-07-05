@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')

<div class="card shadow-soft border-0 mb-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h3 class="fw-bold mb-1" style="color: var(--primary-color);">

                    <i class="bi bi-journal-bookmark-fill me-2"></i>

                    Data Mata Kuliah

                </h3>

                <p class="text-muted mb-0">

                    Kelola seluruh data mata kuliah yang tersedia pada sistem akademik.

                </p>

            </div>

            <a href="{{ route('mata_kuliah.create') }}" class="btn btn-primary-custom mt-3 mt-md-0">

                <i class="bi bi-plus-circle me-2"></i>

                Tambah Mata Kuliah

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

                        <th width="6%">No</th>

                        <th width="15%">Kode MK</th>

                        <th>Nama Mata Kuliah</th>

                        <th width="10%" class="text-center">SKS</th>

                        <th>Jurusan</th>

                        <th width="15%" class="text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($mata_kuliahs as $index => $item)

                        <tr>

                            <td>

                                {{ $mata_kuliahs->firstItem() + $index }}

                            </td>

                            <td>

                                <span class="badge bg-primary-subtle text-primary">

                                    {{ $item->kode_mk }}

                                </span>

                            </td>

                            <td>

                                {{ $item->nama_mk }}

                            </td>

                            <td class="text-center">

                                <span class="badge bg-success">

                                    {{ $item->sks }}

                                </span>

                            </td>

                            <td>

                                <span class="badge bg-light text-dark border">

                                    {{ $item->jurusan->nama_jurusan ?? '-' }}

                                </span>

                            </td>

                            <td class="text-center">

                                <a href="{{ route('mata_kuliah.edit',$item->id) }}"
                                   class="btn btn-warning btn-sm action-btn"
                                   title="Edit">

                                    <i class="bi bi-pencil-fill"></i>

                                </a>

                                <form
                                    action="{{ route('mata_kuliah.destroy',$item->id) }}"
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

                            <td colspan="6" class="text-center py-5">

                                <i class="bi bi-journal-x fs-1 text-secondary d-block mb-3"></i>

                                <strong class="text-secondary">

                                    Belum ada data mata kuliah.

                                </strong>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4">

            {{ $mata_kuliahs->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection