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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('projeto_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('nome', 255);
            $table->text('descricao')->nullable();
            $table->date('data_final');
            $table->string('status', 255);
            $table->boolean('ativo')->default(true);
            // $table->media();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
