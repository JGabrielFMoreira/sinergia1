<?php

namespace App\Http\Controllers;

use App\Models\EquipeRamal as ModelsEquipeRamal;
use App\Models\EstruturaEquipe;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EquipeRamal extends Controller
{

    public function index()
    {
        $equipes = EstruturaEquipe::where('status', 'ATIVO')->orderBy('equipe')->get();
        $entregas = ModelsEquipeRamal::with('equipe')->orderByDesc('id')->get();
        return Inertia::render('Ramal/Index', compact('equipes', 'entregas'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
       
        $validator = $request->validate([
            'equipe' => 'required|int',
            'tipo' => 'required|string',
            'metros' => 'required|int',
        ]);

        ModelsEquipeRamal::create([
            'equipe_id' => $validator['equipe'],
            'tipo' => $validator['tipo'],
            'qtd_ramal' => $validator['metros'],
        ]);
    
        BannerMessage::message('Ramal lançado');
        return redirect()->route('ramal.index');
    }


    public function show($id)
    {

        $entrega = ModelsEquipeRamal::with('equipe')->find($id);
        return Inertia::render('Ramal/Show', compact('entrega'));
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
        
        ModelsEquipeRamal::findOrFail($id)->delete();
        BannerMessage::message('Lançamento excluído.');
        return redirect()->route('ramal.index');

    }
}
