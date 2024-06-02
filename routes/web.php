<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class,'index'])->name('login');
    Route::post('/', [SesiController::class,'login']);
});
// Route::get('/home', function ()){
//     return
// }

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class,'index'])->name('adminHome');
    Route::get('/admin/customer', [AdminController::class,'customer']);
    Route::get('/admin/admin', [AdminController::class,'admin']);
    Route::get('/admin/owner', [AdminController::class,'owner']);
    Route::get('/admin/adminMobil', [AdminController::class,'adminMobil'])->name('adminMobil');
    Route::get('/admin/customerMobil', [AdminController::class,'customerMobil'])->name('customerMobil');
    Route::get('/logout', [SesiController::class,'logout']);

    //form pesanan feature
    Route::get('/admin/formPesanan}', [AdminController::class,'formPesanan'])->name('formPesanan');
    Route::post('/admin/pesanan', [AdminController::class, 'storePesanan'])->name('pesanan_store');

    //car feature CRUD
    Route::delete('/mobil_destroy/{mobil}', [AdminController::class, 'destroyMobil'])->name('mobil_destroy');
    Route::get('/admin/mobil/{mobil}/edit', [AdminController::class, 'editMobil'])->name('mobil_edit');
    Route::post('/admin/mobil', [AdminController::class, 'storeMobil'])->name('mobil_store');
    Route::put('/mobil_update/{mobil}', [AdminController::class,'updateMobil'])->name('mobil_update');
    Route::get('mobilDetail/{id}',[AdminController::class,'showMobilDetail'])->name('mobilDetail');
}); 

// Route::get('adminMobil', function () {
//     return view('adminMobil');
// });

