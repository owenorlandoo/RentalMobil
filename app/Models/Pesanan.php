<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    protected $primaryKey = 'pesananID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mobilID',
        'tanggalMulai',
        'tanggalBerakhir',
        'totalPembayaran',
        'statusPesanan',
        'buktiTransfer',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggalMulai' => 'date',
        'tanggalBerakhir' => 'date',
        'totalPembayaran' => 'integer',
        'statusPesanan' => 'boolean',
    ];

    /**
     * Get the mobil that owns the pesanan.
     */
    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobilID');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}
