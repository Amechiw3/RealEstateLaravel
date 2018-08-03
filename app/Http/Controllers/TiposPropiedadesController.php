<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

use realestate\TipoPropiedad;
use Illuminate\Support\Facades\Redirect;
use realestate\Http\Requests\TiposPropiedadesFormRequest;
use DB;

class TiposPropiedadesController extends Controller
{
    //
    public function __contruct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $tipospropiedades = DB::table('tipospropiedades')
            ->orderBy('nombre', 'ASC')
            ->where('nombre','LIKE','%'.$query.'%')
            ->paginate(11);
            return view('tipospropiedades.index', ['tipospropiedades' => $tipospropiedades]);
        }

    }

    public function create() {

        return view('tipospropiedades.create');
    }

    public function store(TiposPropiedadesFormRequest $request) {
        $tipopropiedad = new TipoPropiedad();
        $tipopropiedad->nombre = $request->get('nombre');
        $tipopropiedad->descripcion = $request->get('descripcion');
        $tipopropiedad->save();
        return Redirect::to('TiposPropiedades');

    }

    public function show($id) {
        return view('tipospropiedades/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit($id) {
        return view('tipospropiedades.edit', ['tipopropiedad'=>TipoPropiedad::findOrFail($id)]);
    }

    public function update(TiposPropiedadesFormRequest $request, $id) {

        $TipoPropiedad = TipoPropiedad::findOrFail($id);
        $TipoPropiedad->nombre = $request->get('nombre');
        $TipoPropiedad->update();
        return Redirect::to('TiposPropiedades');
    }

    public function destroy($id) {
        $TipoPropiedad = TipoPropiedad::findOrFail($id);
        $TipoPropiedad->delete();
        return Redirect::to('TiposPropiedades');
    }
}
