@extends('principal')
@section('content')
	<table class="table">
		<thead>
			<th>Cliente</th>
			<th>RFC</th>
			<th>Servicio</th>
			<th>Intervalo de fecha</th>
			<th>Periodicidad</th>
		</thead>
		<tbody>
			<td>Dummy</td>
			<td>RFC</td>
			<td>Dummy service</td>
			<td>2 meses</td>
			<td><select>
				<option>Dia</option>
				<option>Semana</option>
				<option>Mes</option>
				<option>3 meses</option>
				<option>6 meses</option>
				<option>Anual</option>
			</select></td>
		</tbody>
	</table>
@endsection