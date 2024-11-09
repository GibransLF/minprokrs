<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $fillable = ['jurusan_id', 'dosen_id', 'kode_mk', 'nama_mk', 'sks'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
