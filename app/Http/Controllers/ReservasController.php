<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

class ReservasController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $reservas = DB::table('reservas')
            ->join('estados', 'reservas.estado', '=', 'estados.estadoid')
            ->where('ciudad','LIKE','%'.$query.'%')
            ->orderBy('ciudad', 'ASC')
            ->paginate(12);
            return view('reservas.index', ['reservas' => $reservas]);
        }

    }

    public function create() {

        return view('reservas.create');
    }

    public function store(CiudadesFormRequest $request) {

        $ciudad = new Ciudad();
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->save();
        return Redirect::to('reservas/ciudad');

    }

    public function show($id) {
        return view('reservas/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit() {
        return view('reservas/ciudad.edit', ['ciudad'=>Ciudad::findOrFail($id)]);


    }

    public function update(CiudadesFormRequest $request, $id) {

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->update();
        return Redirect::to('reservas/ciudad');
    }

    public function destroy($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return Redirect::to('reservas/ciudad')->with('success', 'La ciudad ha sido eliminada');
    }
}
