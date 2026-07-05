<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        // Mengambil data kelas beserta relasi dosen dan mata_kuliah
        $kelas = Kelas::with(['dosen', 'mataKuliah'])->latest()->paginate(10);
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        // Mengirim dua data master untuk dropdown
        $dosens = Dosen::all();
        $mata_kuliahs = MataKuliah::all();
        return view('kelas.create', compact('dosens', 'mata_kuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|max:50',
            'dosen_id' => 'required|exists:dosen,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id'
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $dosens = Dosen::all();
        $mata_kuliahs = MataKuliah::all();
        return view('kelas.edit', compact('kelas', 'dosens', 'mata_kuliahs'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kelas' => 'required|max:50',
            'dosen_id' => 'required|exists:dosen,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id'
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil dihapus!');
    }
}