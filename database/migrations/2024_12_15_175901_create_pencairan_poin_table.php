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
        Schema::create('pencairan_poin', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('idUser'); // Foreign key
            $table->integer('jumlah_poin')->default(0); // Total poin redeemed
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade'); // Foreign key constraint
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencairan_poin');
    }
};
