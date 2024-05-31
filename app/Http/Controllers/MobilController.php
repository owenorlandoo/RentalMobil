<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'gambarMobil' => 'image',
            'platNomor'=>'required',
            'merk'=>'required',
            'model'=>'required',
            'nama'=>'required',
            'tahun'=>'required',
            'warna'=>'required',
            'kapasitasPenumpang'=>'required',
            'transmission'=>'required',
            'mesin'=>'required',
            'hargaRental'=>'required',
            'deskripsi'=>'required',
            'statusKetersediaan'=>'required'

        ]);

        if ($request->file('gambarMobil')) {
            $validateData['gambarMobil'] = $request->file('gambarMobil')->store('images', ['disk' => 'public']);

            Produk::create([
                'foto_produk' => $validateData['foto_produk'],
                'nama_produk' => $validateData['nama_produk'],
                'harga_produk' => $validateData['harga_produk'],
                'deskripsi_produk'=> $validateData['deskripsi_produk'],
                'category_id'=>  $validateData['category_id'],
                'highlights_produk' => $request->has('highlights_produk')
            ]);
        }

        
        return redirect()->route('product_view');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        //
    }
}
