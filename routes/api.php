<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LaporanController;
use App\Http\Controllers\Api\RegisterController;

Route::get('/laporan', [LaporanController::class, 'index']);
Route::post('/laporan', [LaporanController::class, 'store']);
Route::put('/laporan/{id}/approve', [LaporanController::class, 'approve']);
Route::post('/register', [RegisterController::class, 'register']);