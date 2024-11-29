<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembelian', function (Blueprint $table) {
            $table->id(); // Kolom primary key 'id' otomatis dibuat
            $table->unsignedBigInteger('hasilkarya_id'); // Kolom foreign key
            $table->foreign('hasilkarya_id')->references('id')->on('hasil_karya')->onDelete('cascade');
            $table->unsignedBigInteger('user_id'); // Kolom foreign key untuk user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('total_harga', 10, 2); // Kolom harga
            $table->timestamp('tanggal')->useCurrent(); // Kolom tanggal dengan default saat ini
            $table->timestamps(); // Kolom created_at dan updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_pembelian');
    }
}
