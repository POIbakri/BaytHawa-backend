<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

// Define your API routes here
Route::get('/data', [ApiController::class, 'getData']);
Route::post('/data', [ApiController::class, 'postData']);

use App\Http\Controllers\SupabaseController;

Route::get('/data', [SupabaseController::class, 'index']);
// Add other routes as needed

