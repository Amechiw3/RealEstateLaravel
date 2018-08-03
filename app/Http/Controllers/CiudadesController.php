<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

use realestate\Ciudad;
use realestate\Estado;
use Illuminate\Support\Facades\Redirect;
use realestate\Http\Requests\CiudadesFormRequest;
use DB;

class CiudadesController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $ciudades = DB::table('ciudades')
            ->join('estados', 'ciudades.estado', '=', 'estados.estadoid')
            ->where('ciudad','LIKE','%'.$query.'%')
            ->orderBy('ciudad', 'ASC')
            ->paginate(12);
            return view('ciudades.index', ['ciudades' => $ciudades]);
        }
    }

    public function create() {

        return view('ciudades.create', ['estados' => Estado::all()]);
    }

    public function store(CiudadesFormRequest $request) {
        $ciudad = new Ciudad();
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->save();
        return Redirect::to('Ciudades');

    }

    public function show($id) {
        return view('ciudades/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit($id) {
        return view('ciudades.edit', ['ciudad'=>Ciudad::findOrFail($id), 'estados' => Estado::all()]);
    }

    public function update(CiudadesFormRequest $request, $id) {

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->update();
        return Redirect::to('Ciudades');
    }

    public function destroy($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return Redirect::to('Ciudades');
    }
}
