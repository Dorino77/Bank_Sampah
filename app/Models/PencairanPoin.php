<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencairanPoin extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sesuai dengan konvensi Laravel)
    protected $table = 'pencairan_poin';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'idUser',
        'jumlah_poin',
    ];

    /**
     * Relasi ke model User (satu pencairan poin dimiliki oleh satu pengguna).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
}
