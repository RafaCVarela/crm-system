<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

describe('Colunas do Model User', function () {

    beforeEach(function () {
        $this->users = User::factory()->count(5)->make();

    });

    it('gerando users', function () {

        expect($this->users)->toBeObject()
            ->and($this->users)->toBeInstanceOf(Collection::class)
            ->toHaveCount(5);

        expect($this->users->first())
            ->toBeInstanceOf(User::class);
    });

    it('nome dos users', function () {
        foreach($this->users as $user){
            expect($user->nome)->not->toBeEmpty();
            expect($user->nome)->toBeString();
        }
    });

    it('email dos users', function () {
        foreach($this->users as $user){
            expect($user->email)->toBeString();
            expect($user->email)->toBeEmail();
        }
    });

    it('telefone dos user', function () {
        foreach($this->users as $user){
            expect($user->telefone)->toBeString();
            expect($user->telefone)->toBeTelefoneBr();
        }
    });


    it('cpf dos user', function () {
        foreach($this->users as $user){
            expect($user->cpf)->toBeString();
            expect($user->cpf)->toBeCpf();
        }
    });

    it('users ativos e inativos', function () {
        foreach($this->users as $user) {
            if($user->ativo){
                expect($user->ativo)->toBeTrue();
            } else {
                expect($user->ativo)->toBeFalse();
            }
        }
    });
});
