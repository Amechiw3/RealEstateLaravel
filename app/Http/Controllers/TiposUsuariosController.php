<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

class TiposUsuariosController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $tiposusuarios = DB::table('tiposusuarios')
            ->join('estados', 'tiposusuarios.estado', '=', 'estados.estadoid')
            ->where('ciudad','LIKE','%'.$query.'%')
            ->orderBy('ciudad', 'ASC')
            ->paginate(12);
            return view('tiposusuarios.index', ['tiposusuarios' => $tiposusuarios]);
        }

    }

    public function create() {

        return view('tiposusuarios.create');
    }

    public function store(CiudadesFormRequest $request) {

        $ciudad = new Ciudad();
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->save();
        return Redirect::to('tiposusuarios/ciudad');

    }

    public function show($id) {
        return view('tiposusuarios/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit() {
        return view('tiposusuarios/ciudad.edit', ['ciudad'=>Ciudad::findOrFail($id)]);


    }

    public function update(CiudadesFormRequest $request, $id) {

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->update();
        return Redirect::to('tiposusuarios/ciudad');
    }

    public function destroy($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return Redirect::to('tiposusuarios/ciudad')->with('success', 'La ciudad ha sido eliminada');
    }
}
