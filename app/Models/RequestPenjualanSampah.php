<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPenjualanSampah extends Model
{
    use HasFactory;

    protected $table = 'request_penjualan_sampah';

    protected $fillable = [
        'nama',
        'alamat',
        'nomor_hp',
        'deskripsi_sampah',
        'jam_pengambilan',
    ];
}
