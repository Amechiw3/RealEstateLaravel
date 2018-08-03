<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //
    protected $table = "reservas";

    protected $primaryKey = "reservaid";

    protected $fillable = [
        'propiedadid',
        'usuarioid',
        'tiporeserva',
        'check_in',
        'check_out'
    ];
}
