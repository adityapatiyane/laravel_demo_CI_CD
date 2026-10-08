<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Laravel deployment: successfully deployed',
        'status' => 'ok',
        'user_details_api' => [
            'list' => 'GET /api/user-details',
            'create' => 'POST /api/user-details',
            'show' => 'GET /api/user-details/{id}',
            'update' => 'PUT|PATCH /api/user-details/{id}',
            'delete' => 'DELETE /api/user-details/{id}',
        ],
    ]);
});

Route::get('/demo', function () {
    return response()->json([
        'message' => 'Demo route with docker',
        'framework' => 'Laravel 12',
        'status' => 'ok',
    ]);
});

Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
    ]);
});
