<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class PermisoNegado extends Model
{
    //
    protected $table = "permisosnegados";

    protected $primaryKey = "PermisosnegadoID";

    protected $fillable = [
        'permiso', 'tipousuario', 'estatus'
    ];
}
