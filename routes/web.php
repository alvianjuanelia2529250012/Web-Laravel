<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/Fakultas',FakultasController::class);
Route::resource('/periodes',PeriodeController::class);
Route::get('prodis',[ProdiController::class,'index'])->name('prodis.index');
