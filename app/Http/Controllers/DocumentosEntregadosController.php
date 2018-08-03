<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Carbon;
use realestate\Propiedad;
use realestate\DocumentoEntregado;
use realestate\Http\Requests\DocumentosEntregadosFormRequest;
use DB;

class DocumentosEntregadosController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $documentosentregados = DB::table('documentosentregados')
            ->join('propiedades', 'documentosentregados.propiedad', '=', 'propiedades.propiedadid')
            ->where('colonia','LIKE','%'.$query.'%')
            ->orderBy('ciudad', 'ASC')
            ->paginate(12);
            return view('documentosentregados.index', 
                ['documentosentregados' => $documentosentregados
            ]);
        }

    }

    public function create() {

        return view('documentosentregados.create');
    }

    public function store(DocumentosEntregadosFormRequest $request) {

        $documentoentregado = new DocumentoEntregado();
        if ($request->hasFile('documento')) {
            $fecha = Carbon\Carbon::now();
            $file = $request->file('documento');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $fecha->format('YmdHis').'.'.$extension;
            $file->move('uploads/documentosentregados', $filename);

            $documentoentregado->ruta = $filename;
        }
        $documentoentregado->propiedad = $request->get('propiedadid');
        $documentoentregado->documento = $request->get('documento');

        $documentoentregado->save();
        return Redirect::to('Propiedades');

    }

    public function show($id) {
        return view('documentosentregados/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit() {
        return view('documentosentregados/ciudad.edit', ['ciudad'=>Ciudad::findOrFail($id)]);


    }

    public function update(CiudadesFormRequest $request, $id) {

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->update();
        return Redirect::to('documentosentregados/ciudad');
    }

    public function destroy($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return Redirect::to('documentosentregados/ciudad')->with('success', 'La ciudad ha sido eliminada');
    }
}
