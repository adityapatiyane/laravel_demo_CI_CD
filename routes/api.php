<?php

use App\Http\Controllers\UserDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/user-details', [UserDetailController::class, 'index']);
Route::get('/user-details/{id}', [UserDetailController::class, 'show']);
Route::post('/user-details', [UserDetailController::class, 'store']);
Route::put('/user-details/{id}', [UserDetailController::class, 'update']);
Route::patch('/user-details/{id}', [UserDetailController::class, 'update']);
Route::delete('/user-details/{id}', [UserDetailController::class, 'destroy']);
