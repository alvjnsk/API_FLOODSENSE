<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LaporanController;

Route::get('/laporan', [LaporanController::class, 'index']);
Route::post('/laporan', [LaporanController::class, 'store']);
Route::put('/laporan/{id}/approve', [LaporanController::class, 'approve']);