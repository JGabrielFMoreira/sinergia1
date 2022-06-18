<?php

namespace App\Http\Controllers;

use App\Models\EquipeMedidor;
use App\Models\EstruturaEquipe;
use App\Models\MdEntrega;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SaldoMedidores extends Controller
{

    public function index(Request $request)
    {
        $pesquisa = $request['pesquisar'];


        if ($pesquisa === null) {

            $medidores = EquipeMedidor::with('equipe')->where('status', 'DISPONÍVEL')
                ->orderByDesc('id')
                ->paginate(50)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });

            return Inertia::render('Medidores/Saldo/Index', compact('medidores'));
        }

        $pesquisa_equipe = EstruturaEquipe::where('equipe', $pesquisa)->first();

        if ($pesquisa_equipe === null) {

            $medidores = EquipeMedidor::with('equipe')->where('status', 'DISPONÍVEL')
                ->orderByDesc('id')
                ->where('numero_serie', $pesquisa)
                ->paginate(50)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });
                
            return Inertia::render('Medidores/Saldo/Index', compact('medidores'));
        }

        $equipes = EstruturaEquipe::where('status', 'ATIVO')->where('status', 'DISPONÍVEL')->orderBy('equipe')->get();
        $medidores = EquipeMedidor::with('equipe')
            ->orderByDesc('id')
            ->where('numero_serie', $pesquisa)
            ->orWhere('equipe_id', $pesquisa_equipe->id)
            ->paginate(50)
            ->tap(function ($paginator) {
                return $paginator->getCollection()->transform(function ($item) {
                    return $item;
                });
            });

        return Inertia::render('Medidores/Saldo/Index', compact('medidores'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
