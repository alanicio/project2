@extends('principal')
@section('content')
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Razon Social</th>
	      <th scope="col">RFC</th>
	      <th scope="col">Direccion</th>
	      <th scope="col">Correo</th>
	      <th scope="col">Telefono</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($clientes as $cliente)
		    <tr>
		      <th scope="row">{{$cliente->id}}</th>
		      <td>{{$cliente->razon_social}}</td>
		      <td>{{$cliente->rfc}}</td>
		      <td>{{$cliente->direccion}}</td>
		      <td>{{$cliente->correo}}</td>
		      <td>{{$cliente->telefono}}</td>
		    </tr>
	    @endforeach
	  </tbody>
	</table>
@endsection