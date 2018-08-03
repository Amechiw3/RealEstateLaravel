<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

class PermisosController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $permisos = DB::table('permisos')
            ->join('estados', 'permisos.estado', '=', 'estados.estadoid')
            ->where('ciudad','LIKE','%'.$query.'%')
            ->orderBy('ciudad', 'ASC')
            ->paginate(12);
            return view('permisos.index', ['permisos' => $permisos]);
        }

    }

    public function create() {

        return view('permisos.create');
    }

    public function store(CiudadesFormRequest $request) {

        $ciudad = new Ciudad();
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->save();
        return Redirect::to('permisos/ciudad');

    }

    public function show($id) {
        return view('permisos/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit() {
        return view('permisos/ciudad.edit', ['ciudad'=>Ciudad::findOrFail($id)]);


    }

    public function update(CiudadesFormRequest $request, $id) {

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->update();
        return Redirect::to('permisos/ciudad');
    }

    public function destroy($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return Redirect::to('permisos/ciudad')->with('success', 'La ciudad ha sido eliminada');
    }
}
