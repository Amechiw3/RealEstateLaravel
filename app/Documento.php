<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
    protected $table = "documentos";

    protected $primaryKey = "DocumentosID";

    protected $fillable = [
        'Documento', 'Descripcion'
    ];
}
