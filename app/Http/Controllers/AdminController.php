<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MobilController;
use App\Models\Mobil;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function index()
    {
        echo "Helo, selamat datang";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='logout'>Logout >></a>";
        return view('welcome');
    }

    function customer()
    {
        // echo "Helo, selamat datang Customer";
        // echo "<h1>". Auth::user()->name ."</h1>";
        // echo "<a href='/logout'>Logout >></a>";
        //dipindahkan ke file template.blade.php
        return view('welcome')->with('user', Auth::user());
    }

    function admin()
    {
        // echo "Helo, selamat datang Admin";
        // echo "<h1>". Auth::user()->name ."</h1>";
        // echo "<a href='/logout'>Logout >></a>";
        return view('welcome')->with('user', Auth::user());
    }

    function owner()
    {
        // echo "Helo, selamat datang Owner";
        // echo "<h1>". Auth::user()->name ."</h1>";
        // echo "<a href='/logout'>Logout >></a>";
        return view('welcome')->with('user', Auth::user());
    }



    // KHUSUS UNTUK ADMIN MOBIL

    function adminMobil()
    {
        $mobil = Mobil::all();
        return view('adminMobil')->with([
            'user' => Auth::user(),
            'mobils' => $mobil,
        ]);
    }

    public function createMobil()
    {
        return view('adminMobilCreate');
    }

    public function storeMobil(Request $request)
    {
        $validateData = $request->validate([
            'gambarMobil' => 'required|image',
            'platNomor' => 'required|string',
            'nama' => 'required|string',
            'merk' => 'required|string',
            'model' => 'required|string',
            'tahun' => 'required|integer',
            'warna' => 'required|string',
            'kapasitasPenumpang' => 'required|integer',
            'transmission' => 'required|string',
            'mesin' => 'required|string',
            'hargaRental' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        $validateData['statusKetersediaan'] = $request->has('statusKetersediaan') ? 1 : 0;

        if ($request->file('gambarMobil')) {
            $validateData['gambarMobil'] = $request->file('gambarMobil')->store('images', ['disk' => 'public']);

            Mobil::create($validateData);
        }

        return redirect()->route('adminMobil');
    }

    public function editMobil(Mobil $mobil)
    {
        return view('adminMobilEdit', [
            //'pagetitle' => 'Edit Mobil',
            'mobilEdit' => $mobil
        ]);
    }

    public function updateMobil(Request $request, Mobil $mobil)
    {
        $validateData = $request->validate([
            'gambarMobil' => 'sometimes|image',
            'platNomor' => 'required|string',
            'nama' => 'required|string',
            'merk' => 'required|string',
            'model' => 'required|string',
            'tahun' => 'required|integer',
            'warna' => 'required|string',
            'kapasitasPenumpang' => 'required|integer',
            'transmission' => 'required|string',
            'mesin' => 'required|string',
            'hargaRental' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        $validateData['statusKetersediaan'] = $request->has('statusKetersediaan') ? 1 : 0;

        if ($request->file('gambarMobil')) {
            if ($mobil->gambarMobil) {
                Storage::disk('public')->delete($mobil->gambarMobil);
            }
            $validateData['gambarMobil'] = $request->file('gambarMobil')->store('images', ['disk' => 'public']);
        }

        $mobil->update($validateData);

        return redirect()->route('adminMobil');
    }

    public function destroyMobil(Mobil $mobil)
    {
        if ($mobil->gambarMobil) {
            if (Storage::disk('public')->exists($mobil->gambarMobil)) {
                Storage::disk('public')->delete($mobil->gambarMobil);
            }
        }
        $mobil->delete();

        return redirect()->route('adminMobil');
    }

    public function showMobilDetail($id)
    {
        $mobilDetail = Mobil::find($id);

        if (!$mobilDetail) {
            return redirect()->route('adminMobil')->with('error', 'Mobil not found.');
        }

        return view('mobilDetail', [
            "pagetitle" => "Mobil Detail 🚗",
            "mobilDetail" => $mobilDetail
        ]);
    }

    

}
