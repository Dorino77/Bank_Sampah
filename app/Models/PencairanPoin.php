<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencairanPoin extends Model
{
    use HasFactory;

    protected $table = 'pencairan_poin';

    protected $fillable = [
        'user_id',
        'total_poin',
        'jumlah_poin_dicairkan',
    ];

    public $timestamps = false; // Menonaktifkan created_at dan updated_at

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
