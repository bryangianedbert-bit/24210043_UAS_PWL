<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'jurusan_id',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'mata_kuliah_id');
    }

    public function detailKrs()
    {
        return $this->hasMany(DetailKrs::class, 'mata_kuliah_id');
    }
}