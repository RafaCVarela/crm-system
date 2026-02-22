<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    /** @use HasFactory<\Database\Factories\TarefaFactory> */
    use HasFactory;

    protected $fillable = [
        'projeto_id',
        'nome',
        'descricao',
        'data_final',
        'status',
        'ativo',
        // 'media',
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}
