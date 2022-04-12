<?php

namespace App\Http\Controllers;

use App\Models\EstruturaEncarregado;
use App\Models\EstruturaSupervisor;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EstruturaFiscal extends Controller
{

    public function index()

    {
        $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
        $fiscais = EstruturaEncarregado::with('supervisor')->get();
        return Inertia::render('Estrutura/Fiscais/Index', compact('fiscais', 'supervisores'));
    }

 
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
       
        BannerMessage::message('O valor informado para fiscal já está em uso.', 'danger');
        $validator = $request->validate([
            'nome' => 'required|unique:estrutura_encarregados,name',
            'supervisor' => 'required|int',
            'status' => 'required|string',
        ]);

        EstruturaEncarregado::Create([
            'name' => $validator['nome'],
            'supervisor_id' => $validator['supervisor'],
            'status' => $validator['status'],

        ]);

        BannerMessage::message('Fiscal Cadastrado');
        return redirect()->route('estrutura_fiscal.index');
    }


    public function show($id)
    
    {
        $supervisores = EstruturaSupervisor::where('status', 'ATIVO')->get();
        $fiscal = EstruturaEncarregado::with('supervisor')->find($id);
        return Inertia::render('Estrutura/Fiscais/Show', compact('fiscal', 'supervisores'));
    }


    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {


        $validator = $request->validate([
            'name' => 'required|string',
            'supervisor_id' => 'required|int',
            'status' => 'required|string',

        ]);
        
        $fiscal = EstruturaEncarregado::find($id);
        
       
        if($validator['status'] === 'INATIVO' and $fiscal->equipes()->exists()){
            BannerMessage::message('Fiscal não pode ser Inativado.', 'danger');
            return redirect()->route('estrutura_fiscal.show', $id);
            exit();
        }

        $fiscal->name = $validator['name'];
        $fiscal->supervisor_id = $validator['supervisor_id'];
        $fiscal->status = $validator['status'];
        $fiscal->save();

        BannerMessage::message('Fiscal Editado');
        return redirect()->route('estrutura_fiscal.show', $id);
    }


    public function destroy($id)
    {
        $fiscal = EstruturaEncarregado::find($id);
        if($fiscal->equipes()->exists()){

            BannerMessage::message('Fiscal não pode ser excluído.', 'danger');
            return redirect()->route('estrutura_fiscal.show', $id);

        }

        EstruturaEncarregado::findOrFail($id)->delete();
        BannerMessage::message('Fiscal Excluído.');
        return redirect()->route('estrutura_fiscal.index', $id);
    
    }
}
