<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKrs extends Model
{
    use HasFactory;

    protected $table = 'detail_krs';

    protected $fillable = [
        'krs_id',
        'mata_kuliah_id',
    ];

    public function krs()
    {
        return $this->belongsTo(Krs::class, 'krs_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
}