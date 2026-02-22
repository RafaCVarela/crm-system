<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefaController extends Controller
{

    protected $tarefaService;

    public function __construct(
        TarefaService $tarefaService,
    )
    {
        $tarefaService = $this->tarefaService;
    }
    public function index(Tarefa $tarefa)
    {
        // Gate e policy

        $dados = $tarefa->all();

        return view('', compact('dados'));
    }

    public function show(Tarefa $tarefa)
    {
        // Gate e policy

        $dados = $tarefa;

        dd($dados);

        return view('', compact('dados'));
    }

    public function create()
    {
        // Gate e policy

        return view('');
    }

    public function store(StoreTarefaRequest $request)
    {
        try {
            // Gate e policy

            $dados = $request->validated();

            $resposta = $this->tarefaService->cadastrar($dados);

            return redirect()
                ->route('admins.index')
                ->with('success', 'Administrador cadastrado com sucesso.');
        } catch (Exception $e) {
            return redirect()
                ->route('admins.index');
                ->with('error', 'Administrador não cadastrado: ' . $e->getMessage());
        }
    }

    public function edit(Tarefa $tarefa)
    {
        // Gate e policy

        $dados = $tarefa;

        return view('', compact('dados'));
    }

    public function update(Tarefa $tarefa, UpdateTarefaRequest $request)
    {
        try {
            // Gate e policy

            $dados = $request->validated();

            $resposta = $this->tarefaService->atualizar($dados);

            return redirect()
                ->route('admins.show', $resposta['tarefa'])
                ->with('success', 'Usuário atualizado com sucesso.');
        } catch(Exception $e) {
            return reditect()
                ->route('admins.show', $tarefa)
                ->with('error', 'Usuário não atualizado: ' . $e->getMessage());
        }
    }

    public function destroy(Tarefa $tarefa)
    {
        try {
            // Gate e policy

            $tarefaId = $tarefa->id;
            $tarefa->delete();

            return redirect()
                ->route('admins.index')
                ->with('success', 'Usuário {$tarefaId} deletado com sucesso.');
        } catch (Exception $e) {
            return reditect()
                ->route('admins.index', $tarefa)
                ->with('error', 'Usuário não deletado: ' . $e->getMessage());
        }
    }

    // Implementar soft delete
}
