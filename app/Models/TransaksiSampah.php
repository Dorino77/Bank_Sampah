<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSampah extends Model
{
    use HasFactory;

    protected $table = 'transaksi_sampah'; // Menyebutkan nama tabel

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'user_id',
        'sampah_id',
        'berat',
        'harga_total',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Sampah
    public function sampah()
    {
        return $this->belongsTo(Sampah::class);
    }
}
