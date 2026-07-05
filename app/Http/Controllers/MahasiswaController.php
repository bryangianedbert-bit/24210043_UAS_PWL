<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        // Menangkap inputan pencarian
        $search = $request->input('search');
        
        // Memulai query dengan eager loading
        $query = Mahasiswa::with('jurusan')->latest();

        // Jika ada kata kunci pencarian
        if ($search) {
            $query->where('nama_mahasiswa', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%");
        }

        // Pagination dengan membawa serta parameter pencarian
        $mahasiswas = $query->paginate(10)->appends(['search' => $search]);
        
        return view('mahasiswa.index', compact('mahasiswas', 'search'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('mahasiswa.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim|max:20',
            'nama_mahasiswa' => 'required|max:100',
            'jurusan_id' => 'required|exists:jurusan,id'
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        // Tidak dipakai
    }

    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jurusans = Jurusan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'jurusans'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nim' => 'required|max:20|unique:mahasiswa,nim,' . $id,
            'nama_mahasiswa' => 'required|max:100',
            'jurusan_id' => 'required|exists:jurusan,id'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus!');
    }
}