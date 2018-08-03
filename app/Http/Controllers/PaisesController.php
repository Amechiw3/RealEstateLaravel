<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

use realestate\Pais;
use Illuminate\Support\Facades\Redirect;
use realestate\Http\Requests\PaisesFormRequest;
use DB;

class PaisesController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            $paises = DB::table('paises')
            ->where('pais','LIKE','%'.$query.'%')
            ->orderBy('pais', 'DESC')
            ->paginate(11);
            return view('paises.index', ['paises' => $paises]);
        }

    }

    public function create() {

        return view('paises.create');
    }

    public function store(PaisesFormRequest $request) {
        
        $pais = new Pais();
        $pais->pais = $request->get('nombre');
        $pais->save();
        return Redirect::to('Paises');

    }

    public function show($id) {
        return view('paises/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit($id) {
        return view('Paises.edit', ['pais' => Pais::findOrFail($id)]);

    }

    public function update(PaisesFormRequest $request, $id) {
        $pais = Pais::findOrFail($id);
        $pais->pais = $request->get('nombre');
        $pais->update();
        return Redirect::to('Paises');
    }

    public function destroy($id) {
        $pais = Pais::findOrFail($id);
        $pais->delete();
        return Redirect::to('Paises');
    }
}
