<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\Krs;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah data dari masing-masing tabel
        $jumlahJurusan = Jurusan::count();
        $jumlahDosen = Dosen::count();
        $jumlahMahasiswa = Mahasiswa::count();
        $jumlahMataKuliah = MataKuliah::count();
        $jumlahKelas = Kelas::count();
        $jumlahKrs = Krs::count();

        // Mengirim data ke view dashboard
        return view('dashboard', compact(
            'jumlahJurusan',
            'jumlahDosen',
            'jumlahMahasiswa',
            'jumlahMataKuliah',
            'jumlahKelas',
            'jumlahKrs'
        ));
    }
}