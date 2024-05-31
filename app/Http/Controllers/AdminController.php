<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        echo "Helo, selamat datang";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='logout'>Logout >></a>";
        return view('customer.dashboard');
    }
    function customer()
    {
        echo "Helo, selamat datang Customer";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
    function admin()
    {
        echo "Helo, selamat datang Admin";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
    function owner()
    {
        echo "Helo, selamat datang Owner";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout'>Logout >></a>";
    }
}
