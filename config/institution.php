<?php

return [
    'name' => env('INSTITUTION_NAME', config('app.name')),
    'cnpj' => env('INSTITUTION_CNPJ', '00.000.000/0000-00'),
    'address' => env('INSTITUTION_ADDRESS', 'Endereço exemplo, Cidade, Estado'),
    'phone' => env('INSTITUTION_PHONE', '(11) 99999-9999'),
    'email' => env('INSTITUTION_EMAIL', 'contato@colegio.exemplo'),
    'url' => env('INSTITUTION_URL', env('APP_URL', 'http://localhost')),
    'logo' => env('INSTITUTION_LOGO', '/logo.svg'),
    'social' => [
        'facebook' => env('INSTITUTION_FACEBOOK', null),
        'instagram' => env('INSTITUTION_INSTAGRAM', null),
        'twitter' => env('INSTITUTION_TWITTER', null),
    ],
];
