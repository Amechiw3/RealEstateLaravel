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
}
