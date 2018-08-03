<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class DocumentoEntregado extends Model
{
    //
    protected $table = "documentosentregados";

    protected $primaryKey = "documentoentregadoid";

    protected $fillable = [
        'documento', 
        'propiedad', 
        'ruta'
    ];
}
