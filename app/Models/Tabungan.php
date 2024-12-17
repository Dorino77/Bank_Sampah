<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Tabungan extends Model
{
    use HasFactory;

    protected $table = 'tabungan';
    protected $fillable = ['totalUang'];
    
    // Menambah totalUang
    public static function tambahTotalUang($jumlah)
    {
        // Ambil tabungan terakhir
        $tabungan = self::latest()->first();

        // Jika tidak ada tabungan sebelumnya, buat baris baru
        if (!$tabungan) {
            $tabungan = new self();
            $tabungan->totalUang = 0; // Jika pertama kali, set ke 0
        }

        // Update total uang dengan menambah jumlah yang diberikan
        $tabungan->totalUang += $jumlah;
        $tabungan->save();
    }

    // Mengurangi totalUang
    public static function kurangiTotalUang($jumlah)
    {
        // Ambil tabungan terakhir
        $tabungan = self::latest()->first();

        // Jika tidak ada tabungan sebelumnya, buat baris baru
        if (!$tabungan) {
            $tabungan = new self();
            $tabungan->totalUang = 0; // Jika pertama kali, set ke 0
        }

        // Pastikan tidak ada pengurangan yang membuat totalUang menjadi negatif
        if ($tabungan->totalUang >= $jumlah) {
            $tabungan->totalUang -= $jumlah;
            $tabungan->save();
        } else {
            // Jika tidak cukup uang, Anda bisa menampilkan pesan atau log
            // Misalnya, log error atau tampilkan pesan
            return false;
        }

        return true;
    }
}
