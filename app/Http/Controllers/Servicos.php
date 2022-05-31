<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use App\Models\Servico;
use App\Models\User;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Servicos extends Controller
{

    public function index(Request $request)
    {



        $pesquisa = $request['pesquisar'];

        if ($pesquisa === null) {
            $codigos = Codigo::all();
            $usuarios = User::where('state', 'ATIVO')->get();
            $servicos = Servico::with('codigo', 'user')->orderByDesc('created_at')
                ->paginate(50)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });;

            return Inertia::render('Servicos/Index', compact('servicos', 'codigos', 'usuarios'));
        }

        $pesquisa_responsavel = User::where('name', $pesquisa)->first();

        if($pesquisa_responsavel === null){

            $codigos = Codigo::all();
            $usuarios = User::where('state', 'ATIVO')->get();
            $servicos = Servico::with('codigo', 'user')
            ->where('uc', $pesquisa)
            ->orWhere('status', $pesquisa)
            ->orderByDesc('created_at')
            ->paginate(50);
    
    
            return Inertia::render('Servicos/Index', compact('servicos', 'codigos', 'usuarios'));

        }

        $codigos = Codigo::all();
        $usuarios = User::where('state', 'ATIVO')->get();
        $servicos = Servico::with('codigo', 'user')
        ->where('uc', $pesquisa)
        ->orWhere('status', $pesquisa)
        ->orWhere('responsavel_id', $pesquisa_responsavel->id)
        ->orderByDesc('created_at')
        ->paginate(50);


        return Inertia::render('Servicos/Index', compact('servicos', 'codigos', 'usuarios'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = $request->validate([
            'uc' => 'required | string ',
            'codigo' => 'required | int',
            'responsavel' => 'required | int',
        ]);

        $idUsuario = auth()->id();

        Servico::create([
            'uc' => $validator['uc'],
            'codigo_id' => $validator['codigo'],
            'responsavel_id' => $validator['responsavel'],
            'status' => 'PENDENTE',
            'lancado_por_id' => $idUsuario

        ]);

        BannerMessage::message('Serviço registrado');
        return redirect()->route('servicos.index');
    }


    public function show($id)
    {
        $servico = Servico::with('codigo', 'user', 'user_lancador')->find($id);
        $codigos = Codigo::all();
        $usuarios = User::where('state', 'ATIVO')->get();

        return Inertia::render('Servicos/Show', compact('servico', 'codigos', 'usuarios'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'uc' => 'required | string ',
            'codigo_id' => 'required | int',
            'responsavel_id' => 'required | int',
            'status' => 'required | string',
        ]);

        $servico = Servico::find($id);

        $servico->uc = $validator['uc'];
        $servico->codigo_id = $validator['codigo_id'];
        $servico->responsavel_id = $validator['responsavel_id'];
        $servico->status = $validator['status'];

        $servico->save();

        BannerMessage::message('Serviço editado');
        return redirect()->route('servicos.show', $id);
    }

    public function destroy($id)
    {

        Servico::findOrFail($id)->delete();
        BannerMessage::message('Serviço excluído.');
        return redirect()->route('servicos.index');
    }
}
