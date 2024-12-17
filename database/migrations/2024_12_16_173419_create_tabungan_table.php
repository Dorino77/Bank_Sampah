<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::create('tabungan', function (Blueprint $table) {
                $table->id();
                $table->decimal('totalUang', 15, 2)->default(0); // Kolom untuk menyimpan totalUang
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('tabungan');
        }

};
