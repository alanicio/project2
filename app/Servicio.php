<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable=[
    	'nombre',
    	'periodicidad',
    	'cliente_id',
    	'fecha_inicial',
    	'fecha_final',
    ];

    protected $dates=[
    	'fecha_inicial',
    	'fecha_final',
    ];

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }
}
