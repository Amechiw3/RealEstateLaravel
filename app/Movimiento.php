<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    //
    protected $table = "movimientos";

    protected $primaryKey = "MovimientoID";

    protected $fillable = [
        'Movimiento', 'Usuario'
    ];

}
