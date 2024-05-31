<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mobils';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'platNomor',
        'merk',
        'model',
        'nama',
        'tahun',
        'warna',
        'kapasitasPenumpang',
        'transmission',
        'mesin',
        'hargaRental',
        'deskripsi',
        'gambarMobil',
        'statusKetersediaan',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'statusKetersediaan' => 'boolean',
        'tahun' => 'integer',
        'kapasitasPenumpang' => 'integer',
        'hargaRental' => 'integer',
    ];
}
