<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil_Karya extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'hasil_karya';

    /**
     * Kolom yang dapat diisi secara massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'namaKarya',
        'hargaKarya',
        'deskripsi',
        'stok',
        'gambar',
    ];

    /**
     * Properti default untuk model jika diperlukan.
     */
    protected $guarded = [];
}
