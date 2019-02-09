<?php

namespace ACME;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    public $table = "marcas";

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_marca', 'nom_marca'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
