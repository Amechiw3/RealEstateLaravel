<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    //
    protected $table = "tiposcontratos";

    protected $primaryKey = "tipocontratoid";

    protected $fillable = [
        'tipocontrato'
    ];

    public function propiedades() {
        return $this->hasMany('realestate\Propiedad', 'tipocontratoid');
    }
}
