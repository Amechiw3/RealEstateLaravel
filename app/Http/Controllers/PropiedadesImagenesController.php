<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Carbon;
use realestate\Propiedad;
use realestate\PropiedadImagen;
use realestate\Http\Requests\PropiedadesImagenesFormRequest;
use DB;



class PropiedadesImagenesController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $propiedadesimagenes = DB::table('propiedadesimagenes')
            ->join('users', 'propiedadesimagenes.usuarioid', '=', 'users.id')
            ->join('propiedades', 'propiedadesimagenes.propiedadid', '=', 'propiedades.propiedadid')
                ->join('ciudades', 'propiedades.ciudad', '=', 'ciudades.ciudadid')
                ->join('estados', 'propiedades.estado', '=', 'estados.estadoid')
                ->join('paises', 'propiedades.pais', '=', 'paises.paisid')
            ->where('propiedadesimagenes.usuarioid','=', Auth::id())
            ->where('colonia','LIKE','%'.$query.'%')
            ->paginate(12);
            return view('propiedadesimagenes.index', ['propiedadesimagenes' => $propiedadesimagenes]);
        }

    }

    public function create($id) {
        $propiedad = Propiedad::findOrFail($id);
        $imagenes = PropiedadImagen::all()->where('propiedadid', '=', $id)->sortBy('propiedadimagenid');

        //return view('propiedadesimagenes/ciudad.edit', ['ciudad'=>Ciudad::findOrFail($id)]);
        return view('propiedadesimagenes.create', [
            'propiedad' => $propiedad,
            'imagenes' => $imagenes

        ]);
    }

    public function store(PropiedadesImagenesFormRequest $request) {

        $propiedadimagen = new PropiedadImagen();
        if ($request->hasFile('imagen')) {
            $fecha = Carbon\Carbon::now();
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $fecha->format('YmdHis').'.'.$extension;
            $file->move('uploads/propiedadesimagenes', $filename);
            $propiedadimagen->imagen = $filename;
        }
        $propiedadimagen->propiedadid = $request->get('propiedadid');
        $propiedadimagen->usuarioid = Auth::id();       

        $propiedadimagen->save();
        return Redirect::to('Propiedades');

    }

    public function show($id) {
        return view('propiedadesimagenes/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit($id) {
        $propiedad = Propiedad::findOrFail($id);
        $imagenes = PropiedadImagen::all()->where('propiedadid', '=', $id)->sortBy('propiedadimagenid');

        //return view('propiedadesimagenes/ciudad.edit', ['ciudad'=>Ciudad::findOrFail($id)]);
        return view('propiedadesimagenes.create', [
            'propiedad' => $propiedad,
            'imagenes' => $imagenes

        ]);


    }

    public function update(CiudadesFormRequest $request, $id) {

        $ciudad = Ciudad::findOrFail($id);
        $ciudad->estado = $request->get('estado');
        $ciudad->ciudad = $request->get('ciudad');
        $ciudad->update();
        return Redirect::to('propiedadesimagenes/ciudad');
    }

    public function destroy($id) {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return Redirect::to('propiedadesimagenes/ciudad')->with('success', 'La ciudad ha sido eliminada');
    }
}
