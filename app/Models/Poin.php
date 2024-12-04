<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak menggunakan penamaan konvensional
    protected $table = 'poin';

    // Menentukan kolom yang bisa diisi
    protected $fillable = [
        'idSampah',
        'idUser',
        'jumlahPoin',
    ];

    // Relasi dengan tabel Sampah
    public function sampah()
    {
        return $this->belongsTo(Sampah::class, 'idSampah');
    }

    // Relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
}
