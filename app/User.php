<?php

namespace realestate;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'appaterno',
        'apmaterno',
        'telefono',
        'usuario',
        'imagen',
        'email',
        'tipousuario',
        'estado',
    ];


    public function tiposusuarios() {
        return $this->belongsTo('realestate\TipoUsuario', 'tipousuario');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
