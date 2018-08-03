<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

class MovimientosController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $movimientos = DB::table('movimientos')
            ->join('estados', 'movimientos.estado', '=', 'estados.estadoid')
            ->where('ciudad','LIKE','%'.$query.'%')
            ->orderBy('ciudad', 'ASC')
            ->paginate(12);
            return view('movimientos.index', ['movimientos' => $movimientos]);
        }

    }

    public function create() {

        return view('movimientos.create');
    }

    public function store(CiudadesFormRequest $request) {

        $ciudad = new Ciudad();
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->save();
        return Redirect::to('movimientos/ciudad');

    }

    public function show($id) {
        return view('movimientos/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit() {
        return view('movimientos/ciudad.edit', ['ciudad'=>Ciudad::findOrFail($id)]);


    }

    public function update(CiudadesFormRequest $request, $id) {

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->update();
        return Redirect::to('movimientos/ciudad');
    }

    public function destroy($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return Redirect::to('movimientos/ciudad')->with('success', 'La ciudad ha sido eliminada');
    }
}
