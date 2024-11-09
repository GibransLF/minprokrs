<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurusan extends Model
{
    use HasFactory;

    protected $table='jurusan';
    protected $fillable=[
        'kode_jurusan',
        'nama_jurusan',
    ];

    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class);
    }
    public function mahasiswa(): HasMany
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function mataKuliah(): HasMany
    {
        return $this->hasMany(MataKuliah::class);
    }
}
