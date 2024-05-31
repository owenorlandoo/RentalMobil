<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengembalians';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'pengembalianID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pesananID',
        'tanggalPengembalian',
        'kondisiMobil',
        'denda',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggalPengembalian' => 'date',
        'denda' => 'integer',
    ];

    /**
     * Get the pesanan associated with the pengembalian.
     */
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesananID');
    }
}
