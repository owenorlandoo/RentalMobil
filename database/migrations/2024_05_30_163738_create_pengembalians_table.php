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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id('pengembalianID');
            
            //one to one dengan pesanan
            $table->unsignedBigInteger('pesananID')->unique(); // foreign key to pesanans table
            $table->foreign('pesananID')->references('pesananID')->on('pesanans')->onDelete('cascade');
            $table->date('tanggalPengembalian');
            $table->string('kondisiMobil');
            $table->integer('denda')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};