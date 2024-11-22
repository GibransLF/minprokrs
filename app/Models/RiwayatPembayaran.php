<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RiwayatPembayaran extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pembayaran';

    protected $fillable = [
        'admin_id',
        'mahasiswa_id',
        'semester_id',
        'jurusan_id',
        'kode_pembayaran',
        'gambar',
        'status',
        'keterangan',
    ];

    
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }
    public function admin():BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
    public function mahasiswa():BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function jurusan():BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function krsKontrak():HasMany
    {
        return $this->hasMany(KrsKontrak::class);
    }
}
