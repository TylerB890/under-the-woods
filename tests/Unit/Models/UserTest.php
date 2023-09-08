<?php

namespace tests\Unit\Models;

use App\Models\Plan;
use App\Models\User;

it('Has many plans', function () {
    $user = User::factory()->create();
    $extraUser = User::factory()->create();
    Plan::factory()->count(3)->create(['user_id' => $user->id]);
    Plan::factory()->create(['user_id' => $extraUser->id]);

    expect($user->plans()->count())->toBe(3);
    expect($user->plans()->first())->toBeInstanceOf(Plan::class);

});
