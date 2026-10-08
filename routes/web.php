<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Laravel deployment with CI CD pipeline',
        'status' => 'ok',
    ]);
});

Route::get('/demo', function () {
    return response()->json([
        'message' => 'Demo route is working',
        'framework' => 'Laravel 12',
        'status' => 'ok',
    ]);
});

Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
    ]);
});
