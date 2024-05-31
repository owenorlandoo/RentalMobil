<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
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
    Route::get('/admin', [AdminController::class,'index']);
    Route::get('/admin/customer', [AdminController::class,'customer']);
    Route::get('/admin/admin', [AdminController::class,'admin']);
    Route::get('/admin/owner', [AdminController::class,'owner']);
    Route::get('/logout', [SesiController::class,'logout']);

