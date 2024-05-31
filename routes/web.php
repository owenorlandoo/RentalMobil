<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('dashboard', function () {
//     return view('admin/dashboard');
// });

Route::get('adminMobil', function () {
    return view('adminMobil');
});

Route::get('adminPesanan', function () {
    return view('adminPesanan');
});