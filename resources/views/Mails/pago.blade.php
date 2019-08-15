<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<style>
.logo {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
}
/*h3,h5,h4,th,strong{
	font-family:'Gotham Bold';
}
td,p{
	font-family: 'Gotham Light';
}*/
</style>

<h5 style="text-align: center;margin-right: 25%;margin-left: 25%; color: #255D86">
@if($destinatario)
	RECORDATORIO DE PAGO PARA SU PROXIMA FACTURA
@else
	¡RECUERDE COBRAR!
@endif
</h5>
<div style="text-align: justify;margin-right: 25%;margin-left: 25%;">
	@if($destinatario)
		Estimado cliente {{$servicio->cliente->razon_social}}.<br> <br>
		Se acerca su fecha de pago por concepto del servicio {{$servicio->nombre}}, por la cantidad de ${{number_format($servicio->monto,2)}}.<br>
		Agradecemos su pronto pago, en breve se le enviará su factura por este concepto.<br> 
		Gracias por su preferencia.<br><br>
		Atentamente<br>
		Grupo de Integradores Nonex S.A. de C.V.
	@else
		Recuerde que el {{$fecha_pago->format('d/m/Y')}} le toca pagar a {{$servicio->cliente->razon_social}} por el servicio de {{$servicio->nombre}}<br>
		Favor de enviar la factura a la brevedad.
	@endif
	
</div>
<div><img class="logo" src="{{ $message->embed(public_path() . '/imgs/nonex_logo.png') }}" style="margin-top: 5%;"></div>

@if($destinatario)

<!-- Footer -->
  <footer style="background-color: #1D334C;">
  	<div style="text-align: center;">
  		<a href=" https://www.sistemasnonex.com/"><img src="{{ $message->embed(public_path() . '/imgs/footer/internet.png') }}" style="width: 40px;margin-left: 6px;margin-top: 2px;"></a>
  		<a href="https://www.sistemasnonex.com/blog/"><img src="{{$message->embed(public_path() . '/imgs/footer/blog.png')}}" style="margin-left: 6px;margin-top: 2px;"></a>
  		<a href="https://www.facebook.com/sistemas.nonex/"><img src="{{$message->embed(public_path() . '/imgs/footer/facebook.png')}}" style="margin-top: 2px;"></a>
  	</div>
  	<div style="text-align: center;color: white;margin-top: 10px;margin-bottom: 10px;font-family: 'Gotham Bold'">
  		SOLUCIÓN A PROBLEMAS EN MATERIA DE TECNOLOGÍA
  	</div>
  	<div style="text-align: center;color: white;font-family: 'Gotham Light'">
  		<span>ventas@sistemasnonex.com</span>
  		<span style="margin-left: 10px;">(0155) 2978-4919</span>
  	</div>
  	<div style="color: white;font-family: 'Gotham Light';margin-top: 20px;text-align: center;">
  		<div style="font-size: 12px">
	  		<span style="margin-left: 20px;">Condiciones de Uso y Venta</span>
			<span style="margin-left: 20px;">Aviso de privacidad</span>
			<span style="margin-left: 20px;">Área legal</span>
			<span style="margin-left: 20px;">Cookies</span>
			<span style="margin-left: 100px;">TODOS LOS DERECHOS RESERVADOS A GRUPO DE INTEGRADORES NONEX S.A DE C.V. | 2019</span>
		</div>
		
  	</div>
  	<br>
  </footer>
@endif