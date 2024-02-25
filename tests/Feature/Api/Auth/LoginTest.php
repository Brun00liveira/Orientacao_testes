<?php

use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use Dotenv\Validator;

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

it('should validate email and password fields', function() {
    $data = [
        'email' => 'brunooliveira@gmail.com',
        'password' => 'password',
    ];

    $request = new AuthUserRequest();

    $validator = validator($data, $request->rules());

    expect($validator->fails())->toBeFalse();
});

it('Should fail to validate email and password fields', function() {
    $data = [
        'email' => '',
        'password' => ''
    ];

    $request = new AuthUserRequest();

    $validator = validator($data, $request->rules());

    expect($validator->fails())->toBeTrue();
});
