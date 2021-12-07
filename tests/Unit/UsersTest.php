<?php

use App\Models\User;

uses(Tests\TestCase::class);

test('user is an admin', function () {
    $user = User::factory()->create(['type' => 'admin']);

    expect($user->isAdmin())->toBeTrue();
});

test('user is normal', function () {
    $user = User::factory()->create(['type' => 'normal']);

    expect($user->isNormal())->toBeTrue();
});
