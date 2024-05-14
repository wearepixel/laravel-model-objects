<?php

use Tests\Models\TestUser;

it('converts a model to a model object', function () {
    $user = TestUser::create([
        'name' => 'John Doe',
        'email' => 'john@doe.com',
        'password' => 'password',
        'date_of_birth' => '1992-01-01',
    ]);

    expect($user->modelObject)->toBe('{"name":"John Doe","email":"john@doe.com","password":"password","date_of_birth":"1992-01-01"}');
});

it('hides additional fields if configured', function () {
    $user = TestUser::create([
        'name' => 'John Doe',
        'email' => 'john@doe.com',
        'password' => 'password',
        'date_of_birth' => '1992-01-01',
    ]);

    $user->setHiddenProperties(['password']);

    expect($user->modelObject)->toBe('{"name":"John Doe","email":"john@doe.com","date_of_birth":"1992-01-01"}');
});

it('shows the primary key if configured to do so', function () {
    config(['laravel-model-objects.hide_primary_key' => false]);

    $user = TestUser::create([
        'name' => 'John Doe',
        'email' => 'john@doe.com',
        'password' => 'password',
        'date_of_birth' => '1992-01-01',
    ]);

    expect($user->modelObject)->toBe('{"name":"John Doe","email":"john@doe.com","password":"password","date_of_birth":"1992-01-01","id":1}');
});
