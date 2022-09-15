<?php

use App\Http\Controllers\Marketing\KotaController;
use App\Models\Marketing\Kota;
use Illuminate\Support\Facades\Route;

// Route::apiResource('kota', KotaController::class)->middleware('bindings');
Route::controller(KotaController::class)->group(function () {
    Route::get('kota', 'index');
    Route::post('kota', 'store');
    Route::get('kota/{kota_id}', 'show');
    Route::post('kota/{kota_id}', 'update');
    Route::delete('kota/{kota_id}', 'destroy');
});

// Route::get('kota/{kota_id}', function (Kota $kota_id) {
//     return $kota_id;
// });
