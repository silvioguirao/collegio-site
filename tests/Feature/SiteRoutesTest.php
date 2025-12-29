<?php

use function Pest\Faker\faker;

it('responds 200 for primary public routes', function () {
    $routes = [
        '/',
        '/sobre',
        '/etapas/fundamental-1',
        '/etapas/fundamental-2',
        '/etapas/ensino-medio',
        '/etapas/pre-vestibular',
        '/noticias',
        '/contato',
        '/faq',
        '/politicas/privacidade',
    ];

    foreach ($routes as $uri) {
        $this->get($uri)->assertStatus(200);
    }
});
