<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        // Menggunakan eager loading 'jurusan' agar lebih ringan
        $dosens = Dosen::with('jurusan')->latest()->paginate(10);
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        // Mengambil semua data jurusan untuk dropdown
        $jurusans = Jurusan::all();
        return view('dosen.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen,nidn|max:20',
            'nama_dosen' => 'required|max:100',
            'jurusan_id' => 'required|exists:jurusan,id'
        ]);

        Dosen::create($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        // Tidak dipakai
    }

    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        $jurusans = Jurusan::all();
        return view('dosen.edit', compact('dosen', 'jurusans'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nidn' => 'required|max:20|unique:dosen,nidn,' . $id,
            'nama_dosen' => 'required|max:100',
            'jurusan_id' => 'required|exists:jurusan,id'
        ]);

        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil dihapus!');
    }
}