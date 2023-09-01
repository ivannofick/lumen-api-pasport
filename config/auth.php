<?php
return [
    'defaults' => [
        'guards' => 'api'
    ],
    'guards' => [
        'api' => [
            'driver' => 'passport',
            'provider' => 'users', // default
        ],
    ],
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\Models\User::class
        ]
    ],
];