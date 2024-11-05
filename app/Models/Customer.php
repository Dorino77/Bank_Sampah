<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    // Daftar kolom yang bisa diisi (mass assignable)
    protected $fillable = ['nama', 'password', 'alamat', 'telepon', 'email'];

    // Daftar kolom yang harus disembunyikan dalam array (misalnya JSON)
    protected $hidden = ['password', 'remember_token'];

    // Properti casting
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Mutator untuk mengenkripsi password saat disimpan
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
