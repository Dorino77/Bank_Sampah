<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryTransaksiSampah extends Model
{
    protected $table = 'history_transaksi';

    protected $fillable = [
        'user_id',
        'sampah_id',
        'berat',
        'harga_total',
    ];
}
