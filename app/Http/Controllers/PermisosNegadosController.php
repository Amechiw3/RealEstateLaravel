<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

use realestate\PermisoNegado;
use Illuminate\Support\Facades\Redirect;
use realestate\http\Request\CiudadesFormRequest;
use DB;

class PermisosNegadosController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $permisosnegados = DB::table('permisosnegados')
            ->orderBy('permiso', 'ASC')
            ->paginate(12);
            return view('permisosnegados.index', ['permisosnegados' => $permisosnegados]);
        }

    }

    public function create() {

        return view('permisosnegados.create');
    }

    public function store(CiudadesFormRequest $request) {

        $ciudad = new Ciudad();
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->save();
        return Redirect::to('permisosnegados/ciudad');

    }

    public function show($id) {
        return view('permisosnegados/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit() {
        return view('permisosnegados/ciudad.edit', ['ciudad'=>Ciudad::findOrFail($id)]);


    }

    public function update(CiudadesFormRequest $request, $id) {

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->update();
        return Redirect::to('permisosnegados/ciudad');
    }

    public function destroy($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return Redirect::to('permisosnegados/ciudad')->with('success', 'La ciudad ha sido eliminada');
    }
}
