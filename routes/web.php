<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/login', [LoginController::class, 'index']); 
Route::get('/logout', [LoginController::class, 'logout']); 


Route::get('/register', [RegisterController::class, 'index']); 

Route::middleware('CekLevel:admin')->group (function(){
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/approve', function () {
        return view('approve');
    });
    Route::get('/mobil', function () {
        return view('mobil', [
            "brand" => "Kijang Innova", 
            "tahun" => "2020", 
            "warna" => "Putih"
        ]
        );
    });
    Route::get('/rental', function () {
        return view('rental');
    });

});