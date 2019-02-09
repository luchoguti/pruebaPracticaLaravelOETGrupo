<?php

namespace ACME;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    public $table = "vehiculos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_vehiculo','placa', 'color', 'id_marca','tipo_vehiculo','id_conductor','id_propietario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
