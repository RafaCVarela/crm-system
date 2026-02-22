<?php

describe('somar dois números', function () {
    it('somar dois números inteiros', function () {
        $resultado = soma(1, 2);

        expect($resultado)->toBe(3);
    });

    it('somar dois números reais', function () {
        $resultado = soma(1.5, 2.5);

        expect($resultado)->toBe(4.0);
    });
});
