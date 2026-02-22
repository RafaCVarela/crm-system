<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    /** @use HasFactory<\Database\Factories\ProjetoFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cliente_id',
        'nome',
        'descricao',
        'qtd_tarefas',
        'data_final',
        'status',
        'ativo',
        // 'media',
    ];

    protected $casts = [
        // 'data_final' => date,
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
