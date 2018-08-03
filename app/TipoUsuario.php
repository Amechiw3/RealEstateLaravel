<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    //
    protected $table = "tiposusuarios";

    protected $primaryKey = "tipousuarioid";

    protected $fillable = [
        'tipousuario',
        'descripcion'
    ];


    public function user() {
        return $this->hasMany('realestate\User', 'tipousuarioid');
    }
}
