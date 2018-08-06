<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class TipoPropiedad extends Model
{
    //
    protected $table = "tipospropiedades";

    protected $primaryKey = "tipopropiedadid";

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function propiedades() {
        return $this->hasMany('realestate\Propiedad', 'tipopropiedadid');
    }

}
