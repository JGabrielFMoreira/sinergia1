<?php

use App\Http\Controllers\Atendimentos;
use App\Http\Controllers\EquipeMedidores;
use App\Http\Controllers\EquipeRamal;
use App\Http\Controllers\EstruturaCadastro;
use App\Http\Controllers\EstruturaFiscal;
use App\Http\Controllers\EstruturaSupervisor;
use App\Http\Controllers\SaldoMedidores;
use App\Http\Controllers\Servicos;
use App\Http\Controllers\UsuariosController;
use App\Models\EstruturaEquipe;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/', function() {return Inertia::render('Auth/Login');});

 

//ROTAS PARA CADASTRO DE USUÁRIO:
Route::get('/usuario', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::post('/usuario/store', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::get('/usuario/{id}/show', [UsuariosController::class, 'show'])->name('usuarios.show');
Route::put('/usuario/{id}/update', [UsuariosController::class, 'update'])->name('usuarios.update');
Route::delete('/usuario/{id}/destroy', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

//ROTAS PARA O CADASTRO DE SUPERVISORES
Route::get('/estrutura/supervisor', [EstruturaSupervisor::class, 'index'])->name('estrutura_supervisor.index');
Route::post('/estrutura/supervisor/store', [EstruturaSupervisor::class, 'store'])->name('estrutura_supervisor.store');
Route::get('/estrutura/supervisor/{id}/show', [EstruturaSupervisor::class, 'show'])->name('estrutura_supervisor.show');
Route::put('/estrutura/supervisor/{id}/update', [EstruturaSupervisor::class, 'update'])->name('estrutura_supervisor.update');
Route::delete('/estrutura/supervisor/{id}/destroy', [EstruturaSupervisor::class, 'destroy'])->name('estrutura_supervisor.destroy');


//ROTAS PARA CADASTRO DE FISCAIS
Route::get('/estrutura/fiscal', [EstruturaFiscal::class, 'index'])->name('estrutura_fiscal.index');
Route::post('/estrutura/fiscal/store', [EstruturaFiscal::class, 'store'])->name('estrutura_fiscal.store');
Route::get('/estrutura/fiscal/{id}/show', [EstruturaFiscal::class, 'show'])->name('estrutura_fiscal.show');
Route::put('/estrutura/fiscal/{id}/update', [EstruturaFiscal::class, 'update'])->name('estrutura_fiscal.update');
Route::delete('/estrutura/fiscal/{id}/destroy', [EstruturaFiscal::class, 'destroy'])->name('estrutura_fiscal.destroy');

//ROTAS PARA CADASTRO DE EQUIPES
Route::get('/estrutura', [EstruturaCadastro::class, 'index'])->name('estrutura.index');
Route::post('/estrutura/equipe/store', [EstruturaCadastro::class, 'store'])->name('estrutura_equipe.store');
Route::get('/estrutura/equipe/{id}/show', [EstruturaCadastro::class, 'show'])->name('estrutura_equipe.show');
Route::put('/estrutura/equipe/{id}/update', [EstruturaCadastro::class, 'update'])->name('estrutura_equipe.update');
Route::delete('/estrutura/equipe/{id}/destroy', [EstruturaCadastro::class, 'destroy'])->name('estrutura_equipe.destroy');



//ROTAS PARA CADASTRO DE MEDIDORES:
Route::get('/medidor', [EquipeMedidores::class, 'index'])->name('medidores.index');
Route::post('/medidor/store', [EquipeMedidores::class, 'store'])->name('medidores.store');
Route::get('/medidor/{id}/show', [EquipeMedidores::class, 'show'])->name('medidores.show');
Route::delete('/medidor/{id}/destroy', [EquipeMedidores::class, 'destroy'])->name('medidores.destroy');

//ROTAS PARA SALDO DE MEDIDORES:
Route::get('/medidor/saldo', [SaldoMedidores::class, 'index'])->name('saldo_medidores.index');


//ROTAS PARA CADASTRO DE RAMAL:

Route::get('/ramal', [EquipeRamal::class, 'index'])->name('ramal.index');
Route::post('/ramal/store', [EquipeRamal::class, 'store'])->name('ramal.store');
Route::get('/ramal/{id}/show', [EquipeRamal::class, 'show'])->name('ramal.show');

Route::delete('/ramal/{id}/destroy', [EquipeRamal::class, 'destroy'])->name('ramal.destroy');


//ROTAS PARA REGISTROS DE ATENDIMENTO

Route::get('/atendimento', [Atendimentos::class, 'index'])->name('atendimento.index');
Route::post('/atendimento/store', [Atendimentos::class, 'store'])->name('atendimento.store');
Route::get('/atendimento/{id}/show', [Atendimentos::class, 'show'])->name('atendimento.show');
Route::put('/atendimento/{id}/update', [Atendimentos::class, 'update'])->name('atendimento.update');
Route::delete('/atendimento/{id}/destroy', [Atendimentos::class, 'destroy'])->name('atendimento.destroy');

//ROTAS PARA REGISTROS DE DISTRIBUIÇÃO DE SERVIÇOS

Route::get('/servicos', [Servicos::class, 'index'])->name('servicos.index');
Route::post('/servicos/store', [Servicos::class, 'store'])->name('servicos.store');
Route::get('/servicos/{id}/show', [Servicos::class, 'show'])->name('servicos.show');
Route::put('/servicos/{id}/update', [Servicos::class, 'update'])->name('servicos.update');
Route::delete('/servicos/{id}/destroy', [Servicos::class, 'destroy'])->name('servicos.destroy');