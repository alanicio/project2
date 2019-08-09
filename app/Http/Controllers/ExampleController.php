<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ExampleController extends Controller
{
	public function example()
	{
		date_default_timezone_set('America/Mexico_City');
    	dd(Carbon::now()->format('%a'));
	}
}
