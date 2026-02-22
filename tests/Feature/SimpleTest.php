<?php

test('verifica boot do laravel', function () {
    // Se isso falhar, o PHP não está encontrando sua pasta tests/ no autoload
    expect(app())->toBeInstanceOf(\Illuminate\Foundation\Application::class);

    $response = $this->get('/');
    $response->assertStatus(200);
});
