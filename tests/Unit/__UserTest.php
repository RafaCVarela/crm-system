<?php

use App\Models\User;

describe('criando um usuário/administrador', function () {

    $user = User::factory()->make();

    expect($user)->toBeObject();
});
