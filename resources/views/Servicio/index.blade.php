@extends('principal')
@section('content')
@php
	date_default_timezone_set('America/Mexico_City');
	$hoy=new DateTime(date('Y-m-d'));
	//echo $hoy->format('d/m/Y').'<br>';
	//dd($hoy);
@endphp
	<table class="table">
		<thead>
			<th>Servicio</th>
			<th>Cliente</th>
			<th>Fecha de inicio</th>
			<th>Fecha final</th>
			<th>Duracion</th>
			<th>Periodicidad de cobro</th>
			<th>Dias hasta el proximo pago</th>
		</thead>
		<tbody>
			@foreach($servicios as $servicio)
				@php
					$start=new DateTime($servicio->fecha_inicial);
					switch ($servicio->periodicidad) {
			            case 'dia':
			                # code...
			                break;

			            case 'semana':			            	
			                while($hoy>=$start)
			                {
			                	$start->add(new DateInterval('P7D'));
			                }			              
			                $diferencia=$hoy->diff($start);		                
			                break;

			            case 'mes':				            	
			            	$oldDay = $start->format("d");
		            		$i=0;		            	
			                while($hoy>=$start)
			                {					                	
			                	$start=new DateTime($servicio->fecha_inicial);
			                	$i++;
			                	$start->add(new DateInterval('P'.$i.'M'));
			                	$newDay = $start->format("d");
				                if($oldDay != $newDay && $newDay) {			
								    $start->sub(new DateInterval("P" . $newDay . "D"));
								}
			                }
			            	$diferencia=$hoy->diff($start);
			                break;

			            case '3 meses':
			                $oldDay = $start->format("d");
		            		$i=0;		            	
			                while($hoy>=$start)
			                {					                	
			                	$start=new DateTime($servicio->fecha_inicial);
			                	$i++;
			                	$start->add(new DateInterval('P'.($i*3).'M'));
			                	$newDay = $start->format("d");
				                if($oldDay != $newDay && $newDay) {			
								    $start->sub(new DateInterval("P" . $newDay . "D"));
								}
			                }
			            	$diferencia=$hoy->diff($start);
			                break;

			            case '6 meses':
			                $oldDay = $start->format("d");
		            		$i=0;		            	
			                while($hoy>=$start)
			                {					                	
			                	$start=new DateTime($servicio->fecha_inicial);
			                	$i++;
			                	$start->add(new DateInterval('P'.($i*6).'M'));
			                	$newDay = $start->format("d");
				                if($oldDay != $newDay && $newDay) {			
								    $start->sub(new DateInterval("P" . $newDay . "D"));
								}
			                }
			            	$diferencia=$hoy->diff($start);
			                break;

			            case 'anual':
			                $oldDay = $start->format("d");
		            		$i=0;		            	
			                while($hoy>=$start)
			                {					                	
			                	$start=new DateTime($servicio->fecha_inicial);
			                	$i++;
			                	$start->add(new DateInterval('P'.$i.'Y'));
			                	$newDay = $start->format("d");
				                if($oldDay != $newDay && $newDay) {			
								    $start->sub(new DateInterval("P" . $newDay . "D"));
								}
			                }
			            	$diferencia=$hoy->diff($start);
			                break;
			        }
			        $diferencia
				@endphp
				<tr>
					<td>{{$servicio->nombre}}</td>
					<td>{{$servicio->cliente->razon_social}}</td>
					<td>{{$servicio->fecha_inicial->format('d/m/Y')}}</td>
					<td>{{$servicio->fecha_final->format('d/m/Y')}}</td>
					<td>{{$servicio->fecha_inicial->diff($servicio->fecha_final)->format('%y años, %m meses, %d días')}}</td>
					<td>{{$servicio->periodicidad}}</td>
					<td>{{$diferencia->m>0?$diferencia->format('%m meses y %d días'):$diferencia->format('%d días')}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection