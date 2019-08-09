@extends('principal')
@section('content')
	<form method="POST" action="{{route('clientes.store')}}">
		{{ csrf_field() }}
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="razon_social">Razon Social</label>
				<input type="text" class="form-control" id="razon_social" placeholder="Razon Social" name="razon_social" required="">
			</div>
			<div class="form-group col-md-6">
				<label for="rfc">RFC</label>
				<input type="text" class="form-control" required="" id="rfc" placeholder="RFC" name="rfc">
			</div>
		</div>
		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input type="text" class="form-control" required="" id="direccion" placeholder="Direccion" name="direccion">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="correo">Correo</label>
				<input type="email" class="form-control" required="" id="correo" name="correo">
			</div>
			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" class="form-control" required="" id="telefono" placeholder="Local o celular" name="telefono">
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</form>
@endsection