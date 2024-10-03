<?php

use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('account->user_id is null after user->id is changed', function () {
    $manager = User::factory()
        ->create([
            'id' => 5001
        ]);

    $account = Account::factory()
        ->recycle($manager)
        ->create();

    expect($manager->accounts->count())->toBe(1);

    $manager->update([
        'id' => 10001
    ]);

    $account->refresh();

    expect($account->user_id)->toBeNull();

    $manager2 = User::factory()
        ->create([
            'id' => 5100
        ]);

    $account->update([
        'user_id' => $manager2->id,
    ]);

    expect($account->user_id)->toBe(5100);
});
