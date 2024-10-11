<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fakultas extends Model
{
    use HasFactory;

    protected $table='fakultas';
    protected $fillable=[
        'kode_fakultas',
        'nama_fakultas',
    ];

    public function jurusan(): HasMany
    {
        return $this->hasMany(Jurusan::class);
    }
    public function mahasiswa(): HasMany
    {
        return $this->hasMany(Mahasiswa::class);
    }

}
