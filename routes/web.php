<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupabaseController;

Route::get('/', function () {
    return 'Home page';
});

Route::get('/supabase-data', [SupabaseController::class, 'index']);
Route::get('/supabase-data', [App\Http\Controllers\SupabaseController::class, 'index']);
