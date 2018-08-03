<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use realestate\Pais;
use realestate\Estado;
use realestate\Ciudad;
use realestate\TipoPropiedad;
use realestate\Propiedad;
use realestate\PropiedadImagen;
use realestate\Documento;
use Carbon;

use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Support\Facades\Redirect;
use realestate\Http\Requests\PropiedadesFormRequest;
use DB;

class PropiedadesController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request) {
            $query = trim($request->get('searchText'));
            
            $propiedades = DB::table('propiedades')
                ->join('ciudades', 'propiedades.ciudad', '=', 'ciudades.ciudadid')
                ->join('estados', 'propiedades.estado', '=', 'estados.estadoid')
                ->join('paises', 'propiedades.pais', '=', 'paises.paisid')
                ->where('usuarioid','=', Auth::id())
                ->where('colonia','LIKE','%'.$query.'%')
                ->paginate(11);
            
                $imagenes = PropiedadImagen::all()->sortBy('propiedadimagenid');
                $documentos = Documento::all()->sortBy('documento');

            return view('propiedades.index', [
                'propiedades' => $propiedades,
                'imagenes' => $imagenes,
                'documentos' => $documentos
            ]);
        }

    }

    public function create() {
        $config = array();
        $config['map_height'] = '400px';
        $config['center'] = 'Hermosillo, Sonora, Mexico';
        $config['zoom'] = '12';
        //$config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
        $config['onclick'] = 'placeMarker(event.latLng);';

        $gmaps = new GMaps();
        $gmaps->initialize($config);

        $map = $gmaps->create_map();
        
        return view('propiedades.create',[
            'paises' => Pais::all()->sortBy('pais'),
            'estados' => Estado::all()->sortBy('estado'),
            'ciudades' => Ciudad::all()->sortBy('ciudad'),
            'tipospropiedades' => TipoPropiedad::all()->sortBy('nombre'),
            'maps' => $map
        ]);
    }

    public function store(PropiedadesFormRequest $request) {

        $propiedad = new Propiedad();
        
        if ($request->hasFile('imagen')) {
            $fecha = Carbon\Carbon::now();
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $fecha->format('YmdHis').'.'.$extension;
            $file->move('uploads/propiedades', $filename);
            $propiedad->imagen = $filename;
        }
        $propiedad->tipopropiedad = $request->get('tipopropiedad');
        $propiedad->usuarioid = Auth::id();
        $propiedad->propiedadfecha = $request->get('propiedadfecha');
        $propiedad->pais = $request->get('pais');
        $propiedad->estado = $request->get('estado');
        $propiedad->ciudad = $request->get('ciudad');
        $propiedad->codigopostal = $request->get('codigopostal');
        $propiedad->colonia = $request->get('colonia');
        $propiedad->calle = $request->get('calle');
        $propiedad->latitude = $request->get('latitud');
        $propiedad->longitude = $request->get('longitud');
        $propiedad->numerohab = $request->get('numerohab');
        $propiedad->area = $request->get('area');
        $propiedad->precio = $request->get('precio');
        $propiedad->informacionadic = $request->get('informacionadic');
        

        $propiedad->save();
        return Redirect::to('Propiedades');

    }

    public function show($id) {
        return view('propiedades/ciudad.show', ['ciudad'=>Ciudad::findOrFail($id)]);
    }

    public function edit($id) {
        $gmaps = new GMaps();
        $propiedad = Propiedad::findOrFail($id);

        $config = array();
        $config['map_height'] = '400px';
        $config['center'] = 'Hermosillo, Sonora, Mexico';
        $config['zoom'] = '12';        
        //$config['onclick'] = 'placeMarker(event.latLng);';
        $gmaps->initialize($config);
        
        $marker = array();
        $marker['position'] = $propiedad->latitude .", ". $propiedad->longitude;
        $marker['ondragend'] = 'placeMarker(event.latLng);';
        $marker['draggable'] = true;
        $gmaps->add_marker($marker);

        $map = $gmaps->create_map();

        return view('propiedades.edit', [
            'paises' => Pais::all()->sortBy('pais'),
            'estados' => Estado::all()->sortBy('estado'),
            'ciudades' => Ciudad::all()->sortBy('ciudad'),
            'tipospropiedades' => TipoPropiedad::all()->sortBy('nombre'),
            'propiedad' => $propiedad,
            'maps' => $map
        ]);
    }

    public function update(PropiedadesFormRequest $request, $id) {

        $propiedad = Propiedad::findOrFail($id);
        
        if ($request->hasFile('imagen')) {
            $fecha = Carbon\Carbon::now();
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $fecha->format('YmdHis').'.'.$extension;
            $file->move('uploads/propiedades', $filename);
            $propiedad->imagen = $filename;
        } else {
            $propiedad->imagen = $propiedad->imagen;
        }
        $propiedad->tipopropiedad = $request->get('tipopropiedad');
        $propiedad->usuarioid = Auth::id();
        $propiedad->propiedadfecha = $request->get('propiedadfecha');
        $propiedad->pais = $request->get('pais');
        $propiedad->estado = $request->get('estado');
        $propiedad->ciudad = $request->get('ciudad');
        $propiedad->codigopostal = $request->get('codigopostal');
        $propiedad->colonia = $request->get('colonia');
        $propiedad->calle = $request->get('calle');
        $propiedad->latitude = $request->get('latitud');
        $propiedad->longitude = $request->get('longitud');
        $propiedad->numerohab = $request->get('numerohab');
        $propiedad->area = $request->get('area');
        $propiedad->precio = $request->get('precio');
        $propiedad->informacionadic = $request->get('informacionadic');
        $propiedad->update();
        return Redirect::to('Propiedades');
    }

    public function destroy($id) {
        $propiedad = Propiedad::findOrFail($id);
        if(File::exists(public_path('uploads/propiedades/'.$propiedad->imagen)) && $propiedad->imagen != "default.png") {
            File::delete(public_path('uploads/propiedades/'.$propiedad->imagen));
        }
        $propiedad->delete();
        return Redirect::to('Propiedades');
    }
}
