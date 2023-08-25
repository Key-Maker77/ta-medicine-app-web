<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengobatan extends Model
{
    use HasFactory;
    protected $table = 'pengobatans';

    protected $fillable = [
        'nama_pengobatan',
        'gambar',
        'penjelasan',
        'manfaat',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
