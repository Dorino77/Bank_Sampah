<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel customers.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('nama'); // Kolom untuk nama
            $table->string('password'); // Kolom untuk password
            $table->string('alamat'); // Kolom untuk alamat
            $table->string('telepon'); // Kolom untuk telepon
            $table->string('email')->unique(); // Kolom untuk email, harus unik
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    /**
     * Balikkan migrasi (menghapus tabel customers).
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
