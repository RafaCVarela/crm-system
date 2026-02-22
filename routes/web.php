<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->middleware(['auth', 'verified'])->group(function () {

    Route::prefix('/dashboard')->middleware(['dashboard'])->name('dashboards.')->group(function () {
        Route::get('/', [DashboardController::class])
            ->name('index');
    });


    Route::prefix('/admins')->controller(AdminController::class)->middleware(['admins'])->name('admins.')->group(function () {

        Route::get('/', 'index')
            ->name('index');
        Route::get('/{user}', 'show')
            ->name('show');

        Route::prefix('/cadastrar')->name('criar.')->group(function () {
            Route::get('/', 'create')
                ->name('create');
            Route::post('/', 'store')
                ->name('store');
        });

        Route::prefix('/atualizar')->name('atualizar.')->group(function () {
            Route::get('/{user}', 'edit')
                ->name('edit');
            Route::put('/{user}', 'update')
                ->name('update');
        });
    });

    Route::prefix('/projetos')->controller(ProjetoController::class)->middleware(['projetos'])->name('projetos.')->group(function () {

        Route::get('/', 'index')
            ->name('index');
        Route::get('/{projeto}', 'show')
            ->name('show');

        Route::prefix('/cadastrar')->name('criar.')->group(function () {
            Route::get('/', 'create')
                ->name('create');
            Route::post('/', 'store')
                ->name('store');
        });

        Route::prefix('/atualizar')->name('atualizar.')->group(function () {
            Route::get('/{projeto}', 'edit')
                ->name('edit');
            Route::put('/{projeto}', 'update')
                ->name('update');
        });
    });

        Route::prefix('/tarefas')->controller(TarefaController::class)->middleware(['tarefas'])->name('tarefas.')->group(function () {

        Route::get('/', 'index')
            ->name('index');
        Route::get('/{tarefa}', 'show')
            ->name('show');

        Route::prefix('/cadastrar')->middleware(['criar-tarefa'])->name('criar.')->group(function () {
            Route::get('/', 'create')
                ->name('create');
            Route::post('/', 'store')
                ->name('store');
        });

        Route::prefix('/atualizar')->middleware(['atualizar-tarefa'])->name('atualizar.')->group(function () {
            Route::get('/{tarefa}', 'edit')
                ->name('edit');
            Route::put('/{tarefa}', 'update')
                ->name('update');
        });
    });

});
;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
