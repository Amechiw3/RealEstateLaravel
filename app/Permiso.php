<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    //
    protected $table = "permisos";

    protected $primaryKey = "PermisoID";

    protected $fillable = [
        'Permiso', 'Descripcion'
    ];
}
