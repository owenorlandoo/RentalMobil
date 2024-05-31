<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    //
    public function halamanMobil()
    {
        return view('mobil');
    }

    public function halamanRental()
    {
        return view('rental');
    }

    public function halamanApprove()
    {
        return view('approve');
    }


}
