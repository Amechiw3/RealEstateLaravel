<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    //
    protected $table = "propiedades";

    protected $primaryKey = "propiedadid";

    protected $fillable = [
        'tipocontrato',
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

    public function paises() {
        return $this->belongsTo('realestate\Pais', 'pais');
    }

    public function estados() {
        return $this->belongsTo('realestate\Estado', 'estado');
    }

    public function ciudades() {
        return $this->belongsTo('realestate\Ciudad', 'ciudad');
    }

    public function tipospropiedades() {
        return $this->belongsTo('realestate\TipoPropiedad', 'tipopropiedad');
    }

    public function tiposcontratos() {
        return $this->belongsTo('realestate\TipoPropiedad', 'tipocontrato');
    }
}
