<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\RecordatorioPago;
use App\Servicio;

class ExampleController extends Controller
{
	public function example()
	{
		$servicio=Servicio::find(12);
		Mail::to($servicio->cliente->correo)->send(new RecordatorioPago($servicio));
    	dd('mauil enviado');
	}
}
