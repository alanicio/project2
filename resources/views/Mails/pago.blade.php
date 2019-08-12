<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>

<h5 style="text-align: center;margin-right: 25%;margin-left: 25%; color: #255D86">REALICE SU PAGO EN TIEMPO Y FORMA ¡EVITE RECARGOS!</h5>
<div style="text-align: center;margin-right: 25%;margin-left: 25%;">
	Estimad@ {{$servicio->cliente->razon_social}},<br> el presente se le envía con el fin de recordarle que el próximo {{$fecha_pago->format('d/m/Y')}} vence el pago de su servicio. Le rogamos realizar el pago antes de esa fecha para que evite recargos.

	Atentamente
	Grupo de integradores NONEX.
</div>
<div><img src="{{ $message->embed(public_path() . '/imgs/nonex_logo.png') }}"></div>