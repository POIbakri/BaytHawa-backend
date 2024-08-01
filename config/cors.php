<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],  // You can restrict this to specific methods like ['GET', 'POST', 'PUT']

    'allowed_origins' => ['*'],  // Replace '*' with ['http://localhost:3000'] for local development

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],  // You can specify headers like ['Content-Type', 'X-Requested-With']

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
