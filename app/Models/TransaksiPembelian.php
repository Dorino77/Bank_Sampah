<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelian extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pembelian';

    protected $fillable = [
        'user_id',
        'hasilkarya_id',
        'total_harga',
        'tanggal',
    ];

    // Relasi ke pengguna
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke hasil karya
    public function hasilKarya()
    {
        return $this->belongsTo(HasilKarya::class, 'hasilkarya_id');
    }
}
