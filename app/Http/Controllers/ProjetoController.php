<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjetoController extends Controller
{

    protected $projetoService;

    public function __construct(
        ProjetoService $projetoService,
    )
    {
        $projetoService = $this->projetoService;
    }
    public function index(Projeto $projeto)
    {
        // Gate e policy

        $dados = $projeto->all();

        return view('', compact('dados'));
    }

    public function show(Projeto $projeto)
    {
        // Gate e policy

        $dados = $projeto;

        dd($dados);

        return view('', compact('dados'));
    }

    public function create()
    {
        // Gate e policy

        return view('');
    }

    public function store(StoreProjetoRequest $request)
    {
        try {
            // Gate e policy

            $dados = $request->validated();

            $resposta = $this->projetoService->cadastrar($dados);

            return redirect()
                ->route('admins.index')
                ->with('success', 'Administrador cadastrado com sucesso.');
        } catch (Exception $e) {
            return redirect()
                ->route('admins.index');
                ->with('error', 'Administrador não cadastrado: ' . $e->getMessage());
        }
    }

    public function edit(Projeto $projeto)
    {
        // Gate e policy

        $dados = $projeto;

        return view('', compact('dados'));
    }

    public function update(Projeto $projeto, UpdateProjetoRequest $request)
    {
        try {
            // Gate e policy

            $dados = $request->validated();

            $resposta = $this->projetoService->atualizar($dados);

            return redirect()
                ->route('admins.show', $resposta['projeto'])
                ->with('success', 'Usuário atualizado com sucesso.');
        } catch(Exception $e) {
            return reditect()
                ->route('admins.show', $projeto)
                ->with('error', 'Usuário não atualizado: ' . $e->getMessage());
        }
    }

    public function destroy(Projeto $projeto)
    {
        try {
            // Gate e policy

            $projetoId = $projeto->id;
            $projeto->delete();

            return redirect()
                ->route('admins.index')
                ->with('success', 'Usuário {$projetoId} deletado com sucesso.');
        } catch (Exception $e) {
            return reditect()
                ->route('admins.index', $projeto)
                ->with('error', 'Usuário não deletado: ' . $e->getMessage());
        }
    }

    // Implementar soft delete
}
