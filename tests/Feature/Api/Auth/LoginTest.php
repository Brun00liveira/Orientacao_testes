<?php

use App\Models\User;

use function Pest\Laravel\postJson;

it('should auth user', function() {
    $user = User::factory()->create();
    $data = [
        'email' => $user->email,
        'password' => 'password',
    ];
    postJson(route('auth.login'), $data)->assertOk()->assertJsonStructure(['token']);
});

it('should fail auth with invalid credentials', function() {

    $user = User::factory()->create();
    $invalidData = [
        'email' => $user->email,
        'password' => 'invalid_senha',
    ];
    $response = postJson(route('auth.login'), $invalidData);
    $response->assertStatus(401);
});
