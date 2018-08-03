<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

class PropiedadesResumenesController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $propiedadesresumenes = DB::table('propiedadesresumenes')
            ->join('estados', 'propiedadesresumenes.estado', '=', 'estados.estadoid')
            ->where('ciudad','LIKE','%'.$query.'%')
            ->orderBy('ciudad', 'ASC')
            ->paginate(12);
            return view('propiedadesresumenes.index', ['propiedadesresumenes' => $propiedadesresumenes]);
        }

    }

    public function create() {

        return view('propiedadesresumenes.create');
    }

    public function store(CiudadesFormRequest $request) {

        $ciudad = new Ciudad();
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->save();
        return Redirect::to('propiedadesresumenes/ciudad');

    }

    public function show($id) {
        return view('propiedadesresumenes/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit() {
        return view('propiedadesresumenes/ciudad.edit', ['ciudad'=>Ciudad::findOrFail($id)]);


    }

    public function update(CiudadesFormRequest $request, $id) {

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->update();
        return Redirect::to('propiedadesresumenes/ciudad');
    }

    public function destroy($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return Redirect::to('propiedadesresumenes/ciudad')->with('success', 'La ciudad ha sido eliminada');
    }
}
