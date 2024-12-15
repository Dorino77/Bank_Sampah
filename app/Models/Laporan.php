<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'laporan';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'total_sampah',
        'total_karya',
        'totalUang',
        'tanggal',
    ];

    // Format default untuk atribut tanggal
    protected $dates = ['tanggal'];

    // Jika Anda ingin mengubah nama kolom created_at dan updated_at
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
