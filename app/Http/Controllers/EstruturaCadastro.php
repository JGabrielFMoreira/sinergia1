<?php

namespace App\Http\Controllers;

use App\Models\EstruturaEncarregado;
use App\Models\EstruturaEquipe;
use App\Models\EstruturaSupervisor;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EstruturaCadastro extends Controller
{

    public function index()
    {
        $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
        $fiscais = EstruturaEncarregado::where('status', 'ATIVO')->get();
        $equipes = EstruturaEquipe::with('encarregado', 'supervisor')->orderBy('equipe')->get();

        return Inertia::Render('Estrutura/Equipes/Index', compact('equipes', 'fiscais', 'supervisores'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        BannerMessage::message('O valor informado já está em uso ou não atinge o tamanho valido.', 'danger');
        $validator = $request->validate([
            'equipe' => 'required|min:8|max:8|unique:estrutura_equipes,equipe',
            'fiscal' => 'required|int',
            'supervisor' => 'required|int',
            'empresa' => 'required|string',
            'status' => 'required|string',
        ]);

        EstruturaEquipe::Create([
            'equipe' => $validator['equipe'],
            'fiscal_id' => $validator['fiscal'],
            'supervisor_id' => $validator['supervisor'],
            'empresa' => $validator['empresa'],
            'status' => $validator['status'],

        ]);

        BannerMessage::message('Equipe Cadastrado');
        return redirect()->route('estrutura.index');
    }


    public function show($id)
    {
        $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
        $fiscais = EstruturaEncarregado::where('status', 'ATIVO')->get();
        $equipe = EstruturaEquipe::with('supervisor', 'encarregado')->find($id);
        return Inertia::render('Estrutura/Equipes/Show', compact('equipe', 'fiscais', 'supervisores'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        BannerMessage::message('O valor informado já está em uso ou não atinge o tamanho valido.', 'danger');
        $validator = $request->validate([
            'equipe' => 'required|min:9|max:9',
            'fiscal_id' => 'required|int',
            'supervisor_id' => 'required|int',
            'empresa' => 'required|string',
            'status' => 'required|string',

        ]);

        $equipe = EstruturaEquipe::find($id);


        $equipe->equipe = $validator['equipe'];
        $equipe->fiscal_id = $validator['fiscal_id'];
        $equipe->supervisor_id = $validator['supervisor_id'];
        $equipe->status = $validator['empresa'];
        $equipe->status = $validator['status'];
        $equipe->save();

        BannerMessage::message('Equipe Editada');
        return redirect()->route('estrutura_equipe.show', $id);
    }


    public function destroy($id)
    {

        EstruturaEquipe::findOrFail($id)->delete();
        BannerMessage::message('Equipe Excluída.');
        return redirect()->route('estrutura.index', $id);
    
    }
    
}
