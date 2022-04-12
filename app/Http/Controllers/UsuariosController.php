<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsuarioCategoria;
use App\Services\BannerMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UsuariosController extends Controller
{

    public function index()
    {
        $tipos = UsuarioCategoria::all();
        $usuarios = User::with('categoria')->get();
        return Inertia::render('Usuarios/Index', compact('usuarios', 'tipos'));
    }

    public function create()
    {
        
    }


    public function store(Request $request)
    {
        BannerMessage::message('O valor informado para usuário já está em uso.', 'danger');
        $validator = $request->validate([
            'nome' => 'required|string',
            'matricula' => 'required|string|unique:users,matricula',
            'password' => 'required|string',
            'tipo' => 'required|int',
            'empresa' => 'required|string',
            'status' => 'required|string',

        ]);

        User::Create([
            'name' => $validator['nome'],
            'matricula' => $validator['matricula'],
            'password' =>  Hash::make($validator['password']),
            'categoria_id' => $validator['tipo'],
            'empresa' => $validator['empresa'],
            'state' => $validator['status'],
        ]);
        BannerMessage::message('Usuário criado');
        return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
        $tipos = UsuarioCategoria::all();
        $usuario = User::with('categoria')->find($id);
 
        return Inertia::render('Usuarios/Show', compact('usuario', 'tipos'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'matricula' => 'required|string',
            'categoria_id' => 'required|int',
            'empresa' => 'required|string',
            'state' => 'required|string',

        ]);
        
        $usuario = User::find($id);

        $usuario->name = $validator['name'];
        $usuario->matricula = $validator['matricula'];
        $usuario->categoria_id = $validator['categoria_id'];
        $usuario->empresa = $validator['empresa'];
        $usuario->state = $validator['state'];

        $usuario->save();
        BannerMessage::message('Usuário Editado');
        return redirect()->route('usuarios.show', $id);
        
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        BannerMessage::message('Usuário Excluído.');
        return redirect()->route('usuarios.index', $id);
    }
}
