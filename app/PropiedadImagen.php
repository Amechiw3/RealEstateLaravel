<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class PropiedadImagen extends Model
{
    //
    protected $table = "propiedadesimagenes";

    protected $primaryKey = "propiedadimagenid";

    protected $fillable = [
        'propiedadid',
        'usuarioid',
        'imagen'
    ];
}
