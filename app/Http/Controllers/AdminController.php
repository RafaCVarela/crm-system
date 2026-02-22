<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $userService;

    public function __construct(
        UserService $userService,
    )
    {
        $userService = $this->userService;
    }
    public function index(User $user)
    {
        // Gate e policy

        $dados = $user->all();

        return view('', compact('dados'));
    }

    public function show(User $user)
    {
        // Gate e policy

        $dados = $user;

        dd($dados);

        return view('', compact('dados'));
    }

    public function create()
    {
        // Gate e policy

        return view('');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            // Gate e policy

            $dados = $request->validated();

            $resposta = $this->userService()->cadastrar($dados);

            return redirect()
                ->route('admins.index')
                ->with('success', 'Administrador cadastrado com sucesso.');
        } catch (Exception $e) {
            return redirect()
                ->route('admins.index');
                ->with('error', 'Administrador não cadastrado: ' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        // Gate e policy

        $dados = $user;

        return view('', compact('dados'));
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        try {
            // Gate e policy

            $dados = $request->validated();

            $resposta = $this->userService->atualizar($dados);

            return redirect()
                ->route('admins.show', $resposta['user'])
                ->with('success', 'Usuário atualizado com sucesso.');
        } catch(Exception $e) {
            return reditect()
                ->route('admins.show', $user)
                ->with('error', 'Usuário não atualizado: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            // Gate e policy

            $userId = $user->id;
            $user->delete();

            return redirect()
                ->route('admins.index')
                ->with('success', 'Usuário {$userId} deletado com sucesso.');
        } catch (Exception $e) {
            return reditect()
                ->route('admins.index', $user)
                ->with('error', 'Usuário não deletado: ' . $e->getMessage());
        }
    }

    // Implementar soft delete
}
