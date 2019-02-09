<?php

namespace ACME;

use Illuminate\Database\Eloquent\Model;

class UsuariosAcme extends Model
{
    public $table = "usuarios_acme";
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usu_acme','num_cedula', 'primer_nombre', 'segundo_nombre','apellidos','direccion','telefono','id_ciudad','tipo_usu_acme'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
