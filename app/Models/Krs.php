<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';

    protected $fillable = [
        'mahasiswa_id',
        'semester',
        'tahun_akademik',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function detailKrs()
    {
        return $this->hasMany(DetailKrs::class, 'krs_id');
    }
}