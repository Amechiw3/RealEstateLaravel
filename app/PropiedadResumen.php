<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class PropiedadResumen extends Model
{
    //
    protected $table = "propiedadesresumenes";

    protected $primaryKey = "propiedadresumenid";

    protected $fillable = [
        'propiedadid',
        'reservaid',
        'usuarioid',
        'comentario',
        'clasificacion'
    ];
}
