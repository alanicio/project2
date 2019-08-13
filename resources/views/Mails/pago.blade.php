<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
}
</style>

<h5 style="text-align: center;margin-right: 25%;margin-left: 25%; color: #255D86">
@if($destinatario)
	REALICE SU PAGO EN TIEMPO Y FORMA ¡EVITE RECARGOS!
@else
	¡RECUERDE COBRAR!
@endif
</h5>
<div style="text-align: center;margin-right: 25%;margin-left: 25%;">
	@if($destinatario)
		Estimad@ {{$servicio->cliente->razon_social}},<br> el presente se le envía con el fin de recordarle que el próximo {{$fecha_pago->format('d/m/Y')}} vence el pago de su servicio. Le rogamos realizar el pago antes de esa fecha para que evite recargos.

		Atentamente
		Grupo de integradores NONEX.
	@else
		Recuerde que el {{$fecha_pago->format('d/m/Y')}} le toca pagar a {{$servicio->cliente->razon_social}} por el servicio de {{$servicio->nombre}}
	@endif
	
</div>
<div><img src="{{ $message->embed(public_path() . '/imgs/nonex_logo.png') }}" style="margin-top: 5%;"></div>