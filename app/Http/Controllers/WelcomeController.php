<?php

namespace realestate\Http\Controllers;

use Illuminate\Http\Request;

use FarhanWazir\GoogleMaps\GMaps;
use realestate\Propiedad;
use DB;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $config = array();
        $config['map_height'] = '69vh';
        $config['center'] = 'auto';
        $config['zoom'] = '15';

        $gmaps = new GMaps();
        $gmaps->initialize($config);
     
        $propiedades = Propiedad::select( DB::raw("*, (6371 * ACOS(SIN(RADIANS(latitude)) * SIN(RADIANS(?)) 
        + COS(RADIANS(longitude - ?)) * COS(RADIANS(latitude)) 
        * COS(RADIANS(?)))) AS distance"))
        ->join('ciudades', 'propiedades.ciudad', '=', 'ciudades.ciudadid')
        ->join('estados', 'propiedades.estado', '=', 'estados.estadoid')
        ->join('paises', 'propiedades.pais', '=', 'paises.paisid')
        ->having("distance", "<", 5)
        ->orderBy("distance")
        ->setBindings([29.1094528, -110.98111999999999, 29.1094528]) ->get();

        $marker = array();
        foreach ($propiedades as $prop) {
            $marker['position'] = $prop->latitude .", ". $prop->longitude;
            $marker['infowindow_content'] = $prop->calle.', '.$prop->colonia.', '.$prop->ciudad.', '.$prop->estado.', '.$prop->pais. '<br><br><center><img width="192" src="'. asset("uploads/propiedades/". $prop->imagen). '" alt=""></center>';
            $gmaps->add_marker($marker);
        }

        $map = $gmaps->create_map();
        
        return view('welcome',[
            'maps' => $map
        ]);
    }
}
