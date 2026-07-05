<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        // Menampilkan data dengan pagination 10 per halaman
        $jurusans = Jurusan::latest()->paginate(10);
        return view('jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_jurusan' => 'required|unique:jurusan,kode_jurusan|max:10',
            'nama_jurusan' => 'required|max:100',
        ]);

        Jurusan::create($request->all());

        return redirect()->route('jurusan.index')->with('success', 'Data Jurusan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        // Tidak dipakai untuk master data sederhana
    }

    public function edit(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi input, abaikan unique untuk ID yang sedang diedit
        $request->validate([
            'kode_jurusan' => 'required|max:10|unique:jurusan,kode_jurusan,' . $id,
            'nama_jurusan' => 'required|max:100',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());

        return redirect()->route('jurusan.index')->with('success', 'Data Jurusan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Data Jurusan berhasil dihapus!');
    }
}