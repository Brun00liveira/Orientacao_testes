<?php

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

it('should auth user', fn () =>
    postJson('api/teste', [
        'Content-type' => 'application/json'
    ])->assertStatus(200)
);
