<?php

namespace App\Http\Controllers;

use App\Services\SupabaseService;
use Illuminate\Support\Facades\Log;

class SupabaseController extends Controller
{
    protected $supabase;

    public function __construct(SupabaseService $supabase)
    {
        $this->supabase = $supabase;
    }

    public function index()
{
    Log::info('SupabaseController index method called');
    try {
        $tableName = 'test_table';
        Log::info("Attempting to query Supabase table: {$tableName}");
        
        $data = $this->supabase->query($tableName);
        
        Log::info("Raw data received from Supabase: " . json_encode($data));
        
        if (empty($data)) {
            return response()->json(['message' => 'No data found'], 200);
        }
        
        return response()->json($data);
    } catch (\Exception $e) {
        Log::error('Unexpected error in SupabaseController: ' . $e->getMessage());
        return response()->json([
            'error' => 'An unexpected error occurred',
            'message' => $e->getMessage()
        ], 500);
    }
}
}