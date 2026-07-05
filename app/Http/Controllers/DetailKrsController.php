<?php

namespace App\Http\Controllers;

use App\Models\DetailKrs;
use App\Models\Krs;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class DetailKrsController extends Controller
{
    public function index(Request $request)
    {
        // Jika ada krs_id di URL, tampilkan detail untuk KRS tersebut.
        // Jika tidak ada, tampilkan semua detail KRS.
        $query = DetailKrs::with(['krs.mahasiswa', 'mataKuliah'])->latest();
        
        if ($request->has('krs_id')) {
            $query->where('krs_id', $request->krs_id);
            $krs_aktif = Krs::with('mahasiswa')->find($request->krs_id);
        } else {
            $krs_aktif = null;
        }

        $detail_krs = $query->paginate(10);
        return view('detail_krs.index', compact('detail_krs', 'krs_aktif'));
    }

    public function create(Request $request)
    {
        // Menyediakan pilihan KRS dan Mata Kuliah
        $krs_list = Krs::with('mahasiswa')->get();
        $mata_kuliahs = MataKuliah::all();
        
        // Menangkap krs_id jika dikirim dari tombol "Tambah Mata Kuliah"
        $krs_id_selected = $request->krs_id ?? null;

        return view('detail_krs.create', compact('krs_list', 'mata_kuliahs', 'krs_id_selected'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'krs_id' => 'required|exists:krs,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id'
        ]);

        // Cek agar tidak memasukkan mata kuliah yang sama di KRS yang sama
        $cek_duplikat = DetailKrs::where('krs_id', $request->krs_id)
                                 ->where('mata_kuliah_id', $request->mata_kuliah_id)
                                 ->first();

        if ($cek_duplikat) {
            return back()->with('error', 'Mata Kuliah ini sudah diambil di KRS tersebut!');
        }

        DetailKrs::create($request->all());

        return redirect()->route('detail_krs.index', ['krs_id' => $request->krs_id])
                         ->with('success', 'Mata Kuliah berhasil ditambahkan ke KRS!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $detail = DetailKrs::findOrFail($id);
        $krs_list = Krs::with('mahasiswa')->get();
        $mata_kuliahs = MataKuliah::all();
        
        return view('detail_krs.edit', compact('detail', 'krs_list', 'mata_kuliahs'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'krs_id' => 'required|exists:krs,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id'
        ]);

        $detail = DetailKrs::findOrFail($id);
        
        // Cek duplikat saat update (kecuali data dirinya sendiri)
        $cek_duplikat = DetailKrs::where('krs_id', $request->krs_id)
                                 ->where('mata_kuliah_id', $request->mata_kuliah_id)
                                 ->where('id', '!=', $id)
                                 ->first();

        if ($cek_duplikat) {
            return back()->with('error', 'Mata Kuliah ini sudah diambil di KRS tersebut!');
        }

        $detail->update($request->all());

        return redirect()->route('detail_krs.index', ['krs_id' => $request->krs_id])
                         ->with('success', 'Detail KRS berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $detail = DetailKrs::findOrFail($id);
        $krs_id = $detail->krs_id; // Simpan ID untuk redirect kembali ke list yang sama
        $detail->delete();

        return redirect()->route('detail_krs.index', ['krs_id' => $krs_id])
                         ->with('success', 'Mata Kuliah berhasil dihapus dari KRS!');
    }
}