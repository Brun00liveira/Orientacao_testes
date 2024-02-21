<?php

use function Pest\Laravel\getJson;

it('should return status code 200', fn () =>
    getJson('api/teste', [
        'Content-type' => 'application/json'
    ])->assertStatus(200)
);
