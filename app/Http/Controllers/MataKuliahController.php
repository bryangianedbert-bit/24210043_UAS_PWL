<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mata_kuliahs = MataKuliah::with('jurusan')->latest()->paginate(10);
        return view('mata_kuliah.index', compact('mata_kuliahs'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('mata_kuliah.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah,kode_mk|max:20',
            'nama_mk' => 'required|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'jurusan_id' => 'required|exists:jurusan,id'
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('mata_kuliah.index')->with('success', 'Data Mata Kuliah berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $jurusans = Jurusan::all();
        return view('mata_kuliah.edit', compact('mataKuliah', 'jurusans'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_mk' => 'required|max:20|unique:mata_kuliah,kode_mk,' . $id,
            'nama_mk' => 'required|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'jurusan_id' => 'required|exists:jurusan,id'
        ]);

        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->update($request->all());

        return redirect()->route('mata_kuliah.index')->with('success', 'Data Mata Kuliah berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->delete();

        return redirect()->route('mata_kuliah.index')->with('success', 'Data Mata Kuliah berhasil dihapus!');
    }
}