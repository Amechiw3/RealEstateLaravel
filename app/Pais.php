<?php

namespace realestate;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    //
    protected $table = "paises";

    protected $primaryKey = "paisid";

    protected $fillable = [
        'pais'
    ];

    public function estados() {
        return $this->hasMany('realestate\Estado', 'pais', 'paisid');
    }
    
}
