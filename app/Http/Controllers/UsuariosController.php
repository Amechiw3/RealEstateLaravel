<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use realestate\User;
use realestate\TipoUsuario;

use Illuminate\Support\Facades\Redirect;
use realestate\Http\Requests\UsuariosFormRequest;
use DB;

class UsuariosController extends Controller
{
    //
    public function __contruct(){

    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));

            $usuarios = DB::table('users')
            ->join('tiposusuarios', 'users.tipousuario', '=', 'tiposusuarios.tipousuarioid')
            ->where('usuario','LIKE','%'.$query.'%')
            ->orderBy('appaterno', 'ASC')
            ->paginate(11);
            return view('usuarios.index', ['usuarios' => $usuarios]);
        }

    }

    public function create() {

        return view('usuarios.create', [
            'tipousuario' => TipoUsuario::all()->sortBy('tipousuario')
        ]);
    }

    public function store(UsuariosFormRequest $request) {

        $usuario = new User();
        $usuario->name = $request['nombre'];
        $usuario->email = $request['email'];
        $usuario->password = Hash::make($request['password']);
        $usuario->usuario = $request['usuario'];
        $usuario->appaterno = $request['appaterno'];
        $usuario->apmaterno = $request['apmaterno'];
        $usuario->telefono = $request['telefono'];
        $usuario->tipousuario = $request['tipousuario'];
        $usuario->estado = true;
        $usuario->save();
        return Redirect::to('Usuarios');

    }

    public function show() {
        return view('Usuarios.show');
    }

    public function edit($id) {
        return view('Usuarios.edit', [
            'tipousuario' => TipoUsuario::all()->sortBy('tipousuario'),
            'usuario' => User::findOrFail($id)
        ]);
    }

    public function update(UsuariosFormRequest $request, $id) {

        $usuario = User::findOrFail($id);
        $usuario->name = $request['nombre'];
        $usuario->email = $request['email'];

        if($request['password'] != "") {
            $usuario->password = Hash::make($request['password']);
        }

        $usuario->usuario = $request['usuario'];
        $usuario->appaterno = $request['appaterno'];
        $usuario->apmaterno = $request['apmaterno'];
        $usuario->telefono = $request['telefono'];
        $usuario->tipousuario = $request['tipousuario'];
        $usuario->estado = true;
        $usuario->update();
        return Redirect::to('Usuarios');
    }

    public function destroy($id) {
        $usuario = User::findOrFail($id);
        $usuario->estado = false;
        $usuario->update();
        return Redirect::to('Usuarios');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

}
