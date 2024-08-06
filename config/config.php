<?php

return [
    'host' => env('MULTICHAIN_RPC_HOST'),
    'port' => env('MULTICHAIN_RPC_PORT'),
    'user' => env('MULTICHAIN_RPC_USER'),
    'pass' => env('MULTICHAIN_RPC_PASS'),
    'node_port' => env('MULTICHAIN_NODE_PORT'),
    'middleware' => [
        'api',
    ]
];
