<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $table = "estados";

    protected $primaryKey = "estadoid";

    protected $fillable = [
        'pais',
        'estado'
    ];

    public function pais() {
        return $this->belongsTo('realestate\Pais');
    }

    public function ciudades() {
        return $this->hasMany('realestate\Ciudad', 'estado', 'estadoid');
    }
}
