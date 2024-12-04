<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiSampahTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel transaksi_sampah.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_sampah', function (Blueprint $table) {
            $table->id(); // id transaksi, auto increment
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ID user dari tabel users
            $table->foreignId('sampah_id')->constrained('sampah')->onDelete('cascade'); // ID sampah dari tabel sampah
            $table->decimal('berat', 8, 2); // Berat sampah (dalam kg)
            $table->decimal('harga_total', 15, 2); // Harga total transaksi (Rp)
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    /**
     * Pembatalan migrasi tabel transaksi_sampah.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_sampah');
    }
}
