<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Supabase\Client;

class SupabaseTestController extends Controller
{
    protected $supabase;

    public function __construct(Client $supabase)
    {
        $this->supabase = $supabase;
    }

    public function testConnection()
    {
        try {
            // Attempt to query a table. Replace 'your_table_name' with an actual table in your Supabase project
            $result = $this->supabase->from('test_table')->select('*')->limit(1)->execute();
            
            return response()->json([
                'success' => true,
                'message' => 'Successfully connected to Supabase',
                'data' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to connect to Supabase',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}