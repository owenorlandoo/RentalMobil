<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $imagePath = public_path('images/CarBackground.jpeg'); 
        $imageName = time().'.jepg'; 

        if (Storage::disk('local')->exists($imagePath)){
            Storage::disk('local')->put('public/mobils/'.$imageName, file_get_contents($imagePath)); 
        }else{
            echo "Image file not found: " . $imagePath . "\n";
        }

        $mobilData = [
            [
                'platNomor'=>'LSU123',
                'merk'=>'Kijang Innova',
                'model'=>'Minivan',
                'nama'=>'Kijang Innova',
                'tahun'=>'2020',
                'warna'=>'Hitam',
                'kapasitasPenumpang'=>'8',
                'transmission'=>'manual',
                'mesin'=>'2L 4-silinder',
                'hargaRental'=>'25000',
                'deskripsi'=>'Ayo belilah produk Indonesia',
                'gambarMobil'=> $imageName,
                'statusKetersediaan'=>'true',
            ],
        ];

        dd($mobilData); 

        Mobil::insert($mobilData); 
    }
}
