<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Fitbit Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your connection. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'client_id' => env('FITBIT_CLIENT_ID', 'your-client-id'),
            'client_secret' => env('FITBIT_CLIENT_SECRET', 'your-client-secret'),
            'redirect_url' => env('FITBIT_REDIRECT_URL', 'your-redirect-url')
        ],

        'alternative' => [
            'client_id' => 'your-client-id',
            'client_secret' => 'your-client-secret',
            'redirect_url' => 'your-redirect-url'
        ],

    ],

];
