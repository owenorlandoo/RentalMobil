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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('platNomor')->unique();
            $table->string('merk');
            $table->string('model');
            $table->string('nama');
            $table->integer('tahun');
            $table->string('warna');
            $table->integer('kapasitasPenumpang');
            $table->string('transmission');
            $table->string('mesin');
            $table->integer('hargaRental');
            $table->string('deskripsi');
            $table->string('gambarMobil')->nullable();
            $table->boolean('statusKetersediaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
