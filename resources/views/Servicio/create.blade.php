@extends('principal')
@section('content')
  <form method="POST" action="{{route('servicios.store')}}">
    {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputCliente">Cliente</label>
        <select id="inputCliente" class="form-control" required="" name="cliente_id">
          <option selected>Seleccione cliente...</option>
          @foreach($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->razon_social}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="inputServicio">Servicio</label>
        <input type="text" class="form-control" id="inputServicio" placeholder="nombre del servicio" name="nombre">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputFinicio">Fecha de inicio</label>
        <input type="date" class="form-control" id="inputFinicio" name="fecha_inicial">
      </div>
      <div class="form-group col-md-6">
        <label for="inputFfinal">Fecha final</label>
        <input type="date" class="form-control" id="inputFfinal" name="fecha_final">
      </div>
      <div class="form-group col-md-4">
        <label for="inputDuracion">Duración del servicio</label>
        <input type="text" class="form-control" id="inputDuracion" readonly="">
      </div>
      <div class="form-group col-md-4">
        <label for="inputPeriodicidad">Periodicidad</label>
        <select id="inputPeriodicidad" class="form-control" required="" name="periodicidad">
          <option selected value="" id="Seleccione">Seleccione...</option>
          <option value="1" style="display: none;">Dia</option>
          <option value="2" style="display: none;">Semana</option>
          <option value="3" style="display: none;">Mes</option>
          <option value="4" style="display: none;">3 meses</option>
          <option value="5" style="display: none;">6 meses</option>
          <option value="6" style="display: none;">Anual</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputMonto">Monto</label>
        <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text">$</div>
          </div>
          <input type="number" class="form-control" id="inputMonto" placeholder="$$$" name="monto">
        </div>
      </div>
     <!--  <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text">$</div>
        </div>
        <input type="text" class="form-control" id="inputMonto    " placeholder="Username">
      </div> -->
    </div>
    <div class="form-group">
      <!-- <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
          Check me out
        </label>
      </div> -->
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>

  <script type="text/javascript">
    $('input[type="date"]').change(function(){
      var inicial=new Date($('#inputFfinal').val());
      var final=new Date($('#inputFinicio').val());
      var diff=inicial-final;
      if(diff>0)
      {
        $('#inputDuracion').val(diff/86400000+' días');
        if(diff>=3.154e+10)
        {
          $('option').show();
        }
        else if(diff>=1.577e+10)
        {
          $('option[value="1"]').show();
          $('option[value="2"]').show();
          $('option[value="3"]').show();
          $('option[value="4"]').show();
          $('option[value="5"]').show();
          $('option[value="6"]').hide();
        }
        else if(diff>=7.884e+9)
        {
          $('option[value="1"]').show();
          $('option[value="2"]').show();
          $('option[value="3"]').show();
          $('option[value="4"]').show();
          $('option[value="5"]').hide();
          $('option[value="6"]').hide();
        }
        else if(diff>=2.628e+9)
        {
          $('option[value="1"]').show();
          $('option[value="2"]').show();
          $('option[value="3"]').show();
          $('option[value="4"]').hide();
          $('option[value="5"]').hide();
          $('option[value="6"]').hide();
        }
        else if(diff>=6.048e+8)
        {
          $('option[value="1"]').show();
          $('option[value="2"]').show();
          $('option[value="3"]').hide();
          $('option[value="4"]').hide();
          $('option[value="5"]').hide();
          $('option[value="6"]').hide();
        }
        else if(diff>=8.64e+7)
        {
          $('option[value="1"]').show();
          $('option[value="2"]').hide();
          $('option[value="3"]').hide();
          $('option[value="4"]').hide();
          $('option[value="5"]').hide();
          $('option[value="6"]').hide();
        }
        else
        {
          $('#inputPeriodicidad').children().hide();
          $('#inputDuracion:first-child').show();
        }
      }
      else
      {
        $('#inputPeriodicidad').children().hide();
        $('#Seleccione').show();
        $('#Seleccione').prop('selected', true);
      }
    })
  </script>
@endsection