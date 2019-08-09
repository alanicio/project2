<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'razon_social',
        'rfc',
        'telefono',
        'correo',
        'direccion',
    ];

    public function servicios()
    {
    	return $this->hasMany('App\Servicio');
    }
}
