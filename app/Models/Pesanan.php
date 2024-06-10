<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\AntarAmbilType;

class Pesanan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pesanans';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'alamat',
        'nomorTlp',
        'antarAmbil',
        'alamatPengantaran',
        'tanggalMulai',
        'tanggalBerakhir',
        'totalPembayaran',
        'statusPesanan',
        'buktiTransfer',
        'mobilID',
    ];


    protected $casts = [
        'antarAmbil' => AntarAmbilType::class,
    ];

    // Definisikan relasi dengan model Mobil
    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobilID');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}
