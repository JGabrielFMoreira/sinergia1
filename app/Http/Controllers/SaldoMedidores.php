<?php

namespace App\Http\Controllers;

use App\Models\EstruturaEquipe;
use App\Models\MdEntrega;
use Illuminate\Http\Request;

class SaldoMedidores extends Controller
{

    public function index()
    {
        
        $equipes = EstruturaEquipe::with('encarregado', 'supervisor')->get();
        $entregas = MdEntrega::with('equipe.encarregado')->get();

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
