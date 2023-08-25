<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanans';

    protected $fillable = [
        'id',
        'user_id',
        'nama_pasien',
        'jenis_kelamin',
        'no_hp',
        'jadwal',
        'jam',
        'alamat',
        'jenis_pengobatan',
        'nama_tabib',
        'harga',
        'status',
    ];

    public function tabibs()
    {
        return $this->belongsTo(Tabib::class);
    }

    public function pengobatans()
    {
        return $this->belongsTo(Pengobatan::class);
    }
}
