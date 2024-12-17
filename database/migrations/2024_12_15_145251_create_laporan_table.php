<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->decimal('total_sampah', 15, 2)->nullable(); // Total sampah (15 digit, 2 desimal)
            $table->decimal('total_karya', 15, 2)->nullable(); // Total karya (15 digit, 2 desimal)
            // $table->decimal('totalUang', 15, 2)->nullable(); // Hasil pengurangan
            $table->timestamp('tanggal')->nullable(); // Tanggal laporan
            $table->timestamps(); // Created_at dan Updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
