<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\AntarAmbilType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('nomorTlp');
            $table->enum('antarAmbil', [AntarAmbilType::DIANTAR->value, AntarAmbilType::AMBIL_SENDIRI->value]);
            $table->string('alamatPengantaran')->nullable();
            $table->date('tanggalMulai');
            $table->date('tanggalBerakhir');
            $table->integer('totalPembayaran');
            $table->boolean('statusPesanan')->default(false); // false (pending) by default
            $table->string('buktiTransfer')->nullable();
            $table->timestamps();

            //relasi one-to-many antara mobil dan pesanan
            $table->unsignedBigInteger('mobilID');
            $table->foreign('mobilID')->references('id')->on('mobils')->onDelete('cascade');
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
