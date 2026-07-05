<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';
    
    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
    ];

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'jurusan_id');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'jurusan_id');
    }

    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class, 'jurusan_id');
    }
}