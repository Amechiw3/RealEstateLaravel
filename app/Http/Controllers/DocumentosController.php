<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

use realestate\Documento;
use Illuminate\Support\Facades\Redirect;
use realestate\http\Request\CiudadesFormRequest;
use DB;


class DocumentosController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $documentos = DB::table('documentos')
            ->where('documento', 'LIKE', '%'.$query.'%')
            ->paginate(12);
            return view('documentos.index', [
                'documentos' => $documentos
            ]);
        }

    }

    public function create() {

        return view('documentos.create');
    }

    public function store(CiudadesFormRequest $request) {

        $ciudad = new Ciudad();
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->save();
        return Redirect::to('documentos/ciudad');

    }

    public function show($id) {
        return view('documentos/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit() {
        return view('documentos/ciudad.edit', ['ciudad'=>Ciudad::findOrFail($id)]);


    }

    public function update(CiudadesFormRequest $request, $id) {

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->update();
        return Redirect::to('documentos/ciudad');
    }

    public function destroy($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return Redirect::to('documentos/ciudad')->with('success', 'La ciudad ha sido eliminada');
    }
}
