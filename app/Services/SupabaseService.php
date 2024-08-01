<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class SupabaseService
{
    protected $client;

    public function __construct()
{
    $baseUri = env('SUPABASE_URL');
    $apiKey = env('SUPABASE_KEY');
    
    Log::info("Initializing Supabase Service with URL: {$baseUri}");
    
    $this->client = new Client([
        'base_uri' => $baseUri,
        'headers' => [
            'apikey' => $apiKey,
            'Authorization' => 'Bearer ' . $apiKey,
        ],
        'verify' => false,  // Add this line to disable SSL verification
        'http_errors' => false
    ]);
}

public function query($table, $select = '*')
{
    $url = "/rest/v1/{$table}?select={$select}";
    Log::info("Querying Supabase: GET {$url}");
    
    try {
        $response = $this->client->get($url);
        
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        
        Log::info("Supabase raw response: Status {$statusCode}, Body: {$body}");
        
        $decodedBody = json_decode($body, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error("JSON decoding error: " . json_last_error_msg());
            return null;
        }
        
        return $decodedBody;
    } catch (RequestException $e) {
        Log::error('Supabase request error: ' . $e->getMessage());
        return null;
    } catch (\Exception $e) {
        Log::error('Unexpected error in Supabase query: ' . $e->getMessage());
        return null;
    }
}
}