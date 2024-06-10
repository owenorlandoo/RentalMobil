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
            $validateData['gambarMobil'] = $request->file('gambarMobil')->store('image', ['disk' => 'public']);

            Mobil::create([
                'gambarMobil' => $validateData['gambarMobil'],
                'platNomor' => $validateData['platNomor'],
                'merk' => $validateData['merk'],
                'model'=> $validateData['model'],
                'nama'=>  $validateData['nama'],
                'tahun'=>  $validateData['tahun'],
                'warna'=>  $validateData['warna'],
                'kapasitasPenumpang'=>  $validateData['kapasitasPenumpang'],
                'transmission'=>  $validateData['transmission'],
                'mesin'=>  $validateData['mesin'],
                'hargaRental'=>  $validateData['hargaRental'],
                'deskripsi'=>  $validateData['deskripsi'],
                'statusKetersediaan' => $request->has('statusKetersediaan')
            ]);
        }

        
        return redirect()->route('mobil_view');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        //
        $mobils = Mobil::all();
       
            return view('adminMobil',compact('mobils'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        //
        $mobilEdit = Mobil::where('id', $mobil->id)->first();
        
        return view('adminMobilEdit', [
            'pagetitle' => 'Edit Mobil',
            'mobilEdit' => $mobilEdit,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
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
            if($mobil->gambarMobil){
                Storage::disk('public')->delete($mobil->gambarMobil);
            }
            $validateData['gambarMobil'] = $request->file('gambarMobil')->store('image', ['disk' => 'public']);

            Mobil::create([
                'gambarMobil' => $validateData['gambarMobil'],
                'platNomor' => $validateData['platNomor'],
                'merk' => $validateData['merk'],
                'model'=> $validateData['model'],
                'nama'=>  $validateData['nama'],
                'tahun'=>  $validateData['tahun'],
                'warna'=>  $validateData['warna'],
                'kapasitasPenumpang'=>  $validateData['kapasitasPenumpang'],
                'transmission'=>  $validateData['transmission'],
                'mesin'=>  $validateData['mesin'],
                'hargaRental'=>  $validateData['hargaRental'],
                'deskripsi'=>  $validateData['deskripsi'],
                'statusKetersediaan' => $request->has('statusKetersediaan')
            ]);
        }

        
        return redirect()->route('mobil_view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        //
        if($mobil->gambarMobil){
            if(Storage::disk('public')->exists($mobil->gambarMobil)){
                Storage::disk('public')->delete($mobil->gambarMobil);
            }
        }
        $mobil->delete();

        return redirect()->route('mobil_view');
    }

    public function showMobilDetail($id)
    {
        $mobilDetail = Mobil::find($id);
        

        

        if (!$mobilDetail) {
            // Handle the case where the product with the given ID is not found.
            // You might want to redirect back with an error message or take another appropriate action.
            return redirect()->route('mobil_view')->with('error', 'Mobil not found.');
        }

        
        return view('mobil detail', [
            "pagetitle" => "Mobil Detail 🚗",
            "mobilDetail" => $mobilDetail,
            
        ]);
    }
}
