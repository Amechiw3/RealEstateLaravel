<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

use realestate\Estado;
use realestate\Pais;
use Illuminate\Support\Facades\Redirect;
use realestate\Http\Requests\EstadosFormRequest;
use DB;

class EstadosController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $estados = DB::table('estados')
            ->join('paises', 'estados.pais', '=', 'paises.paisid')
            ->where('estado','LIKE','%'.$query.'%')
            ->orderBy('estado', 'ASC')
            ->paginate(11);

            return view('estados.index', ['estados' => $estados]);
        }

    }

    public function create() {
        return view('Estados.create', ['paises' => Pais::all()]);
    }

    public function store(EstadosFormRequest $request) {

        $estado = new Estado();
        $estado->pais = $request->get('pais');
        $estado->estado = $request->get('estado');
        $estado->save();
        return Redirect::to('Estados');

    }

    public function show($id) {
        return view('ciudades/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit($id) {
        return view('Estados.edit', ['estado' => Estado::findOrFail($id), 'paises' => Pais::all()]);
    }

    public function update(EstadosFormRequest $request, $id) {

        $estado = Estado::findOrFail($id);
        $estado->estado = $request->get('estado');
        $estado->pais = $request->get('pais');
        $estado->update();
        return Redirect::to('Estados');
    }

    public function destroy($id) {
        $estado = Estado::findOrFail($id);
        $estado->delete();
        return Redirect::to('Estados')->with('success', 'La ciudad ha sido eliminada');
    }
}
