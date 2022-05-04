<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\EstruturaEquipe;
use App\Services\BannerMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Atendimentos extends Controller
{

    public function index(Request $request)
    {
        
        $pesquisa = $request['pesquisar'];


        if ($pesquisa === null) {
            $equipes = EstruturaEquipe::where('status', 'ATIVO')->orderBy('equipe')->get();
            $atendimentos = Atendimento::with('equipe', 'user')
                ->orderByDesc('created_at')
                ->paginate(15)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });
            return Inertia::render('Atendimentos/Index', compact('atendimentos', 'equipes'));
        }
    
        $pesquisa_equipe = EstruturaEquipe::where('equipe', $pesquisa)->first();


        if($pesquisa_equipe === null){
            $equipes = EstruturaEquipe::where('status', 'ATIVO')->orderBy('equipe')->get();
            $atendimentos = Atendimento::with('equipe', 'user')
                ->where('uc_atendida', $pesquisa)
                ->orWhere('tipo_atendimento', $pesquisa)
                ->orderByDesc('created_at')
                ->paginate(50);
    
            return Inertia::render('Atendimentos/Index', compact('atendimentos', 'equipes'));
        }
        
        $equipes = EstruturaEquipe::where('status', 'ATIVO')->orderBy('equipe')->get();
        $atendimentos = Atendimento::with('equipe', 'user')
            ->where('uc_atendida', $pesquisa)
            ->orWhere('tipo_atendimento', $pesquisa)
            ->orWhere('equipe_id', $pesquisa_equipe->id)
            ->orderByDesc('created_at')
            ->paginate(50);

        return Inertia::render('Atendimentos/Index', compact('atendimentos', 'equipes'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = $request->validate([
            'equipe' => 'required | int ',
            'tipo' => 'required | string',
            'uc' => 'required | string',
            'os' => 'required | string',

        ]);

        $idUsuario = auth()->id();


        $primeira_consulta = Atendimento::whereDate('created_at', Carbon::today())->where('equipe_id', $validator['equipe'])->get();

        $primeira = "NAO";

        if (count($primeira_consulta) === 0) {
            $primeira = "SIM";
        }

        Atendimento::create([
            'atendente_id' => $idUsuario,
            'equipe_id' => $validator['equipe'],
            'tipo_atendimento' => $validator['tipo'],
            'uc_atendida' => $validator['uc'],
            'os_atribuida' => $validator['os'],
            'primeira_consulta' => $primeira

        ]);
        BannerMessage::message('Atendimento registrado');
        return redirect()->route('atendimento.index');
    }


    public function show($id)
    {

        $equipes = EstruturaEquipe::where('status', 'ATIVO')->orderBy('equipe')->get();
        $atendimento = Atendimento::with('equipe', 'user')->find($id);
        return Inertia::render('Atendimentos/Show', compact('atendimento', 'equipes'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'equipe_id' => 'required|int',
            'tipo_atendimento' => 'required|string',
            'uc_atendida' => 'required|string',
            'os_atribuida' => 'required|string',

        ]);

        $atendimento = Atendimento::find($id);

        $atendimento->equipe_id = $validator['equipe_id'];
        $atendimento->tipo_atendimento = $validator['tipo_atendimento'];
        $atendimento->uc_atendida = $validator['uc_atendida'];
        $atendimento->os_atribuida = $validator['os_atribuida'];

        $atendimento->save();

        BannerMessage::message('Atendimento editado');
        return redirect()->route('atendimento.show', $id);
    }

    public function destroy($id)
    {

        Atendimento::findOrFail($id)->delete();
        BannerMessage::message('Atendimento excluído.');
        return redirect()->route('atendimento.index', $id);
    }
}
