<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    //
    protected $table = "ciudades";

    protected $primaryKey = "ciudadid";

    protected $fillable = [
        'estado', 
        'ciudad'
    ];

    public function estado() {
        return $this->belongsTo('realestate\Estado');
    }

}