<?php

use App\Http\Controllers\Marketing\KotaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('kota', KotaController::class);
