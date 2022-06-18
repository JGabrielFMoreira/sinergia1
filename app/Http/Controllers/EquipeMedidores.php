<?php

namespace App\Http\Controllers;

use App\Models\EquipeMedidor;
use App\Models\EstruturaEquipe;
use App\Models\MdEntrega;
use App\Models\User;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipeMedidores extends Controller
{

    public function index(Request $request)
    {
        $pesquisa = $request['pesquisar'];

        if ($pesquisa === null) {

            $equipes = EstruturaEquipe::where('status', 'ATIVO')->orderBy('equipe')->get();
            $entregas = MdEntrega::with('equipe.encarregado')
                ->orderByDesc('id')
                ->paginate(15)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });

            return Inertia::render('Medidores/Recebido/Index', compact('entregas', 'equipes'));
        }

        $pesquisa_equipe = EstruturaEquipe::where('equipe', $pesquisa)->first();

        $equipes = EstruturaEquipe::where('status', 'ATIVO')->orderBy('equipe')->get();
        $entregas = MdEntrega::with('equipe.encarregado')
            ->orderByDesc('id')
            ->where('equipe_id', $pesquisa_equipe->id)
            ->paginate(15)
            ->tap(function ($paginator) {
                return $paginator->getCollection()->transform(function ($item) {
                    return $item;
                });
            });

        return Inertia::render('Medidores/Recebido/Index', compact('entregas', 'equipes'));
    }

    public function create()
    {
    }


    public function store(Request $request)
    {


        BannerMessage::message('Você informou um medidor que já está cadastrado.', 'danger');
        $validator = $request->validate([

            'medidor_1' => 'required|unique:equipe_medidors,numero_serie',
            'tipo' => 'required|string',
            'equipe' => 'required|int',
            'date' => 'required|date',
            'medidor_2' => 'unique:equipe_medidors,numero_serie',
            'medidor_3' => 'unique:equipe_medidors,numero_serie',
            'medidor_4' => 'unique:equipe_medidors,numero_serie',
            'medidor_5' => 'unique:equipe_medidors,numero_serie',
            'medidor_6' => 'unique:equipe_medidors,numero_serie',
            'medidor_7' => 'unique:equipe_medidors,numero_serie',
            'medidor_8' => 'unique:equipe_medidors,numero_serie',
            'medidor_9' => 'unique:equipe_medidors,numero_serie',
            'medidor_10' => 'unique:equipe_medidors,numero_serie',
            'medidor_11' => 'unique:equipe_medidors,numero_serie',
            'medidor_12' => 'unique:equipe_medidors,numero_serie',


        ]);



        if ($validator['medidor_1'] != null) {

            $qtd_medidores = 1;
        }
        if ($validator['medidor_2'] != null) {

            $qtd_medidores = 2;
        }
        if ($validator['medidor_3'] != null) {

            $qtd_medidores = 3;
        }
        if ($validator['medidor_4'] != null) {

            $qtd_medidores = 4;
        }
        if ($validator['medidor_5'] != null) {

            $qtd_medidores = 5;
        }
        if ($validator['medidor_6'] != null) {

            $qtd_medidores = 6;
        }
        if ($validator['medidor_7'] != null) {

            $qtd_medidores = 7;
        }
        if ($validator['medidor_8'] != null) {

            $qtd_medidores = 8;
        }
        if ($validator['medidor_9'] != null) {

            $qtd_medidores = 9;
        }
        if ($validator['medidor_10'] != null) {

            $qtd_medidores = 10;
        }
        if ($validator['medidor_11'] != null) {

            $qtd_medidores = 11;
        }
        if ($validator['medidor_12'] != null) {

            $qtd_medidores = 12;
        }


        $entrega = MdEntrega::Create([
            'equipe_id' => $validator['equipe'],
            'data_entrega' => $validator['date'],
            'qtd_md' => $qtd_medidores,
            'tipo_md' => $validator['tipo'],

        ]);

        if ($validator['medidor_1'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_1'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_2'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_2'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_3'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_3'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_4'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_4'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_5'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_5'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_6'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_6'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_7'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_7'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_8'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_8'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_9'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_9'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_10'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_10'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_11'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_11'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }
        if ($validator['medidor_12'] != null) {

            EquipeMedidor::Create([
                'md_entrega_id' => $entrega->id,
                'numero_serie' => $validator['medidor_12'],
                'equipe_id' => $validator['equipe'],
                'tipo' => $validator['tipo'],
                'status' => 'DISPONÍVEL',

            ]);
        }

        BannerMessage::message('Medidores Entregues');
        return redirect()->route('medidores.index');
    }


    public function show($id)
    {
        $entrega = MdEntrega::find($id);
        $medidores = EquipeMedidor::with('equipe', 'entrega')->where('md_entrega_id', $id)->get();
        return Inertia::render('Medidores/Recebido/Show', compact('medidores', 'entrega'));
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

        //VERIFICAR SE NÃO EXISTE SERVIÇOS COM ALGUM DESSES MEDIDORES.



        EquipeMedidor::where('md_entrega_id', $id)->delete();


        MdEntrega::findOrFail($id)->delete();
        BannerMessage::message('Medidores excluídos.');
        return redirect()->route('medidores.index', $id);
    }
}
