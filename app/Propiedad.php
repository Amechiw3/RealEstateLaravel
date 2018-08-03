<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    //
    protected $table = "propiedades";

    protected $primaryKey = "propiedadid";

    protected $fillable = [
        'tipopropiedad',
        'usuarioid',
        'propiedadfecha',
        'pais',
        'estado',
        'ciudad',
        'codigopostal',
        'colonia',
        'calle',
        'latitude',
        'longitude',
        'numerohab',
        'area',
        'precio',
        'imagen',
        'informacionadic'
    ];
}
