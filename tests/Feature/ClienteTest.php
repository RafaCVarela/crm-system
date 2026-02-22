<?php

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Collection;

describe('Colunas com o Model Cliente', function () {

    beforeEach(function () {
        $this->clientes = Cliente::factory()->count(5)->make();

    });

    it('gerando clientes', function () {

        expect($this->clientes)->toBeObject()
            ->and($this->clientes)->toBeInstanceOf(Collection::class)
            ->toHaveCount(5);

        expect($this->clientes->first())
            ->toBeInstanceOf(Cliente::class);
    });

    it('nome dos clientes', function () {
        foreach($this->clientes as $cliente){
            expect($cliente->nome)->not->toBeEmpty();
            expect($cliente->nome)->toBeString();
        }
    });

    it('email dos clientes', function () {
        foreach($this->clientes as $cliente){
            expect($cliente->email)->toBeString();
            expect($cliente->email)->toBeEmail();
        }
    });

    it('telefone dos cliente', function () {
        foreach($this->clientes as $cliente){
            expect($cliente->telefone)->toBeString();
            expect($cliente->telefone)->toBeTelefoneBr();
        }
    });


    it('cpf dos cliente', function () {
        foreach($this->clientes as $cliente){
            expect($cliente->cpf)->toBeString();
            expect($cliente->cpf)->toBeCpf();
        }
    });

    it('cnpj dos cliente', function () {
        foreach($this->clientes as $cliente){
            expect($cliente->cnpj)->toBeString();
            expect($cliente->cnpj)->toBeCnpj();
        }
    });

    it('pais dos cliente', function () {
        foreach($this->clientes as $cliente){
            expect($cliente->pais)->toBeString();
            expect($cliente->pais)->toMatch('/^Brasil$/');
        }
    });

    it('estado dos cliente', function () {
        foreach($this->clientes as $cliente){
            expect($cliente->estado)->toBeString();
        }
    });

    it('municipio dos cliente', function () {
        foreach($this->clientes as $cliente){
            expect($cliente->municipio)->toBeString();
        }
    });

    it('logradouro dos cliente', function () {
        foreach($this->clientes as $cliente){
            expect($cliente->logradouro)->toBeString();
        }
    });

    it('clientes ativos e inativos', function () {
        foreach($this->clientes as $cliente) {
            if($cliente->ativo){
                expect($cliente->ativo)->toBeTrue();
            } else {
                expect($cliente->ativo)->toBeFalse();
            }
        }
    });

});
