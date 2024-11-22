<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrsKontrak extends Model
{
    use HasFactory;

    protected $table = 'krs_kontrak';

    protected $fillable = [
        'mahasiswa_id',
        'semester_id',
        'jurusan_id',
        'krs_id',
        'riwayat_pembayaran_id',
    ];

    public function krs()
    {
        return $this->belongsTo(Krs::class);
    }

    public function riwayatPembayaran()
    {
        return $this->belongsTo(RiwayatPembayaran::class);
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
