<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transaksi_sampah', function (Blueprint $table) {
            $table->integer('poin')->default(0)->after('harga_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_sampah', function (Blueprint $table) {
            $table->dropColumn('poin');
        });
    }
};
