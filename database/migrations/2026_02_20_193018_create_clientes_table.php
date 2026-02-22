<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->string('nome', 255);
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('cnpj', 18)->nullable();


            $table->integer('qtd_projetos')->nullable();

            $table->string('pais', 255)->nullable();
            $table->string('estado', 255)->nullable();
            $table->string('municipio', 255)->nullable();
            $table->string('bairro')->nullable();
            $table->string('logradouro')->nullable();
            $table->boolean('ativo')->default(true);

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
