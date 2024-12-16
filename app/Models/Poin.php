<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'poin';

    // Kolom yang dapat diisi
    protected $fillable = [
        'idTransaksiSampah',
        'idUser',
        'jumlahPoin',
    ];

    // Relasi dengan tabel Transaksi_Sampah
    public function transaksiSampah()
    {
        return $this->belongsTo(TransaksiSampah::class, 'idTransaksiSampah');
    }

    // Relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
