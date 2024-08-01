<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData()
    {
        // Logic to fetch data from the database or Supabase
        return response()->json(['message' => 'Data fetched successfully']);
    }

    public function postData(Request $request)
    {
        // Logic to handle incoming data and save to the database or Supabase
        return response()->json(['message' => 'Data saved successfully']);
    }
}

