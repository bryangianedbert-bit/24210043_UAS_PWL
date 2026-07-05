<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\DetailKrs; // Tambahan Model DetailKrs
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        // Mengambil data KRS beserta relasi mahasiswanya
        $krs = Krs::with('mahasiswa')->latest()->paginate(10);
        return view('krs.index', compact('krs'));
    }

    public function create()
    {
        // Mengambil data mahasiswa untuk pilihan dropdown
        $mahasiswas = Mahasiswa::all();
        return view('krs.create', compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'semester' => 'required|in:Ganjil,Genap,Pendek',
            'tahun_akademik' => 'required|max:10'
        ]);

        Krs::create($request->all());

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        // Nanti bisa digunakan untuk melihat Detail KRS
    }

    public function edit(string $id)
    {
        $krs = Krs::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        return view('krs.edit', compact('krs', 'mahasiswas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'semester' => 'required|in:Ganjil,Genap,Pendek',
            'tahun_akademik' => 'required|max:10'
        ]);

        $krs = Krs::findOrFail($id);
        $krs->update($request->all());

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil dihapus!');
    }

    // Tambahan Fungsi Cetak
    public function cetak($id)
    {
        $krs = Krs::with('mahasiswa')->findOrFail($id);
        
        // Ambil detail mata kuliah untuk KRS ini
        $detail_krs = DetailKrs::with('mataKuliah')->where('krs_id', $id)->get();
        
        return view('krs.cetak', compact('krs', 'detail_krs'));
    }
}