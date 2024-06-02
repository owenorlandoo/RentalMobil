<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MobilController;
use App\Models\Mobil;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function index()
    {
        echo "Helo, selamat datang";
        echo "<h1>" . Auth::user()->name . "</h1>";
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


    function customerMobil()
    {
        $mobil = Mobil::all();
        return view('customerMobil')->with([
            'user' => Auth::user(),
            'mobils' => $mobil,
        ]);
    }

    public function createMobil()
    {
        //return view('adminMobilCreate');
    }

    public function storeMobil(Request $request)
    {
        $validateData = $request->validate([
            'gambarMobil' => 'image',
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
            'statusKetersediaan' => 'boolean',
        ]);

        //$validateData['statusKetersediaan'] = $request->has('statusKetersediaan') ? 1 : 0;

        if ($request->file('gambarMobil')) {
            $validateData['gambarMobil'] = $request->file('gambarMobil')->store('images', ['disk' => 'public']);

            Mobil::create([
                'gambarMobil' => $validateData['gambarMobil'],
                'platNomor' => $validateData['platNomor'],
                'merk' => $validateData['merk'],
                'model' => $validateData['model'],
                'nama' => $validateData['nama'],
                'tahun' => $validateData['tahun'],
                'warna' => $validateData['warna'],
                'kapasitasPenumpang' => $validateData['kapasitasPenumpang'],
                'transmission' => $validateData['transmission'],
                'mesin' => $validateData['mesin'],
                'hargaRental' => $validateData['hargaRental'],
                'deskripsi' => $validateData['deskripsi'],
                'statusKetersediaan' => true
            ]);
        } else {
            Mobil::create([
                //'gambarMobil' => $validateData['gambarMobil'],
                'platNomor' => $validateData['platNomor'],
                'merk' => $validateData['merk'],
                'model' => $validateData['model'],
                'nama' => $validateData['nama'],
                'tahun' => $validateData['tahun'],
                'warna' => $validateData['warna'],
                'kapasitasPenumpang' => $validateData['kapasitasPenumpang'],
                'transmission' => $validateData['transmission'],
                'mesin' => $validateData['mesin'],
                'hargaRental' => $validateData['hargaRental'],
                'deskripsi' => $validateData['deskripsi'],
                'statusKetersediaan' => true
            ]);
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
            'gambarMobil' => 'image',
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
            'statusKetersediaan' => 'boolean',
        ]);

        //$validateData['statusKetersediaan'] = $request->has('statusKetersediaan') ? 1 : 0;

        if ($request->file('gambarMobil')) {
            if ($mobil->gambarMobil) {
                Storage::disk('public')->delete($mobil->gambarMobil);
            }
            $validateData['gambarMobil'] = $request->file('gambarMobil')->store('images', ['disk' => 'public']);

            $mobil->update([
                'gambarMobil' => $validateData['gambarMobil'],
                'platNomor' => $validateData['platNomor'],
                'merk' => $validateData['merk'],
                'model' => $validateData['model'],
                'nama' => $validateData['nama'],
                'tahun' => $validateData['tahun'],
                'warna' => $validateData['warna'],
                'kapasitasPenumpang' => $validateData['kapasitasPenumpang'],
                'transmission' => $validateData['transmission'],
                'mesin' => $validateData['mesin'],
                'hargaRental' => $validateData['hargaRental'],
                'deskripsi' => $validateData['deskripsi'],
                'statusKetersediaan' => false
            ]);
        } else {
            $mobil->update([
                //'gambarMobil' => $validateData['gambarMobil'],
                'platNomor' => $validateData['platNomor'],
                'merk' => $validateData['merk'],
                'model' => $validateData['model'],
                'nama' => $validateData['nama'],
                'tahun' => $validateData['tahun'],
                'warna' => $validateData['warna'],
                'kapasitasPenumpang' => $validateData['kapasitasPenumpang'],
                'transmission' => $validateData['transmission'],
                'mesin' => $validateData['mesin'],
                'hargaRental' => $validateData['hargaRental'],
                'deskripsi' => $validateData['deskripsi'],
                'statusKetersediaan' => false
            ]);
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

        return view('customerMobilDetail', [
            "mobilDetail" => $mobilDetail
        ]);
    }


    // KHUSUS UNTUK Customer PESANAN

    function formPesanan()
    {

        
        return view('formPesanan')->with('user', Auth::user());
    }

    //create new pesanan
    public function storePesanan(Request $request, Mobil $mobil)
    {
        $validateData = $request->validate([
            'buktiTransfer' => 'nullable|image',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'nomorTlp' => 'required|string',
            'tanggalMulai' => 'required|date',
            'tanggalBerakhir' => 'required|date',
            'antarAmbil' => 'required|in:diantar,ambil_sendiri',
            'alamatPengantaran' => 'nullable|required_if:antarAmbil,diantar|string',
            'statusPesanan' => 'boolean'
        ]);

        // Menghitung durasi booking dalam hari
        $tanggalMulai = new \DateTime($validateData['tanggalMulai']);
        $tanggalBerakhir = new \DateTime($validateData['tanggalBerakhir']);
        $durasi = $tanggalBerakhir->diff($tanggalMulai)->days;

        // Mendapatkan mobil terkait untuk mengambil hargaRental
        $mobil = Mobil::findOrFail($request->input('id'));

        // Menghitung total pembayaran
        $validateData['totalPembayaran'] = $mobil->hargaRental * $durasi;

        if ($request->file('buktiTransfer')) {
            $validateData['buktiTransfer'] = $request->file('buktiTransfer')->store('images', ['disk' => 'public']);

            Pesanan::create([
                'buktiTransfer' => $validateData['buktiTransfer'],
                'nama' => $validateData['nama'],
                'alamat' => $validateData['alamat'],
                'nomorTlp' => $validateData['nomorTlp'],
                'tanggalMulai' => $validateData['tanggalMulai'],
                'tanggalBerakhir' => $validateData['tanggalBerakhir'],
                'antarAmbil' => $validateData['antarAmbil'],
                'alamatPengantaran' => $validateData['alamatPengantaran'] ?? null,
                'totalPembayaran' => $validateData['totalPembayaran'],
                'statusPesanan' => false, //artinya status pesanan pending
                'mobilID' => $mobil->id
            ]);
        } else {
            Mobil::create([
                'nama' => $validateData['nama'],
                'alamat' => $validateData['alamat'],
                'nomorTlp' => $validateData['nomorTlp'],
                'tanggalMulai' => $validateData['tanggalMulai'],
                'tanggalBerakhir' => $validateData['tanggalBerakhir'],
                'antarAmbil' => $validateData['antarAmbil'],
                'alamatPengantaran' => $validateData['alamatPengantaran'] ?? null,
                'totalPembayaran' => $validateData['totalPembayaran'],
                'statusPesanan' => false, //artinya status pesanan pending
                'mobilID' => $mobil->id
            ]);
        }

        return redirect()->route('formPesanan', [
            'mobilId'=>$mobil
        ]);
    }
}
