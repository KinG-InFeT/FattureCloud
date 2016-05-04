<?php
/**
 * The Inventory configuration file.
 */
return [
    'base_url' => env('FC_BASE_URL', 'https://api.fattureincloud.it'),
    'api_version' => env('FC_API_VERSION', 'v1'),
    'auth' => [
        'uid' => env('FC_UID', '00000'),
        'key' => env('FC_KEY', '00000'),
    ],

];