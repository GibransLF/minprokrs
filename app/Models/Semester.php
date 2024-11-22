<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semester';

    protected $fillable = [
        'nama_semester',
        'tahun_ajaran',
        'mulai_kontrak',
        'tutup_kontrak',
        'nominal_pembayaran',
    ];

    public function krs(): HasMany
    {
        return $this->hasMany(Krs::class);
    }

    public function riwayatPembayaran(): HasMany
    {
        return $this->hasMany(RiwayatPembayaran::class);
    }
}
