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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('pesananID');
            $table->date('tanggalMulai');
            $table->date('tanggalBerakhir');
            $table->integer('totalPembayaran');
            $table->boolean('statusPesanan')->default(false); // false (pending) by default
            $table->string('buktiTransfer')->nullable();
            $table->timestamps();

            //relasi one-to-many antara mobil dan pesanan
            $table->unsignedBigInteger('mobilID');
            $table->foreign('mobilID')->references('mobilID')->on('mobils')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
