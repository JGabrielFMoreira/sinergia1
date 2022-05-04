<?php

namespace App\Http\Controllers;

use App\Models\EstruturaSupervisor as ModelsEstruturaSupervisor;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EstruturaSupervisor extends Controller
{

    public function index(Request $request)
    {


        $pesquisa = $request['pesquisar'];

        if ($pesquisa === null) {

            $supervisores = ModelsEstruturaSupervisor::with('encarregados')->orderBy('id')
                ->paginate(15)
                ->tap(function ($paginator) {
                    return $paginator->getCollection()->transform(function ($item) {
                        return $item;
                    });
                });
            return Inertia::render('Estrutura/Supervisores/Index', compact('supervisores'));
        }
        $supervisores = ModelsEstruturaSupervisor::with('encarregados')->orderBy('id')
            ->where('name', $pesquisa)
            ->orWhere('status', $pesquisa)
            ->paginate(15)
            ->tap(function ($paginator) {
                return $paginator->getCollection()->transform(function ($item) {
                    return $item;
                });
            });
        return Inertia::render('Estrutura/Supervisores/Index', compact('supervisores'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        BannerMessage::message('O valor informado para supervisor já está em uso.', 'danger');
        $validator = $request->validate([
            'nome' => 'required|unique:estrutura_supervisors,name',
            'status' => 'required|string',
        ]);

        ModelsEstruturaSupervisor::Create([
            'name' => $validator['nome'],
            'status' => $validator['status'],

        ]);

        BannerMessage::message('Supervisor Cadastrado');
        return redirect()->route('estrutura_supervisor.index');
    }


    public function show($id)
    {
        $supervisor = ModelsEstruturaSupervisor::find($id);
        return Inertia::render('Estrutura/Supervisores/Show', compact('supervisor'));
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'status' => 'required|string',

        ]);



        $supervisor = ModelsEstruturaSupervisor::find($id);

        if ($validator['status'] === 'INATIVO' and $supervisor->encarregados()->exists()) {
            BannerMessage::message('Supervisor não pode ser Inativado.', 'danger');
            return redirect()->route('estrutura_supervisor.show', $id);
            exit();
        }

        $supervisor->name = $validator['name'];
        $supervisor->status = $validator['status'];
        $supervisor->save();

        BannerMessage::message('Supervisor Editado');
        return redirect()->route('estrutura_supervisor.show', $id);
    }


    public function destroy($id)
    {
        $supervisor = ModelsEstruturaSupervisor::find($id);
        if ($supervisor->encarregados()->exists()) {

            BannerMessage::message('Supervisor não pode ser excluído.', 'danger');
            return redirect()->route('estrutura_supervisor.show', $id);
        }

        ModelsEstruturaSupervisor::findOrFail($id)->delete();
        BannerMessage::message('Supervisor Excluído.');
        return redirect()->route('estrutura_supervisor.index', $id);
    }
}
