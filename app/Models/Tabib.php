<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabib extends Model
{
    use HasFactory;
    protected $table = 'tabibs';

    protected $fillable = [
        'nama_tabib',
        'tanggal_lahir',
        'jenis_kelamin',
        'gambar',
        'nomor_sertifikasi',
        'keahlian',
        'nomor_hp',
        'status',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
