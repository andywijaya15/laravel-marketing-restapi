<?php

use App\Http\Controllers\Marketing\KotaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('kota', KotaController::class);
// Route::controller(KotaController::class)->group(function () {
//     Route::get('kota', 'index');
//     Route::get('kota/{idkota}', 'show');
//     Route::post('kota/{idkota}', 'show');
//     Route::delete('kota/{idkota}', 'destroy');
// });
