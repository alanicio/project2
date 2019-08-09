<ul class="nav nav-tabs"> 
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Clientes</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{route('clientes.index')}}">Lista de clientes</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{route('clientes.create')}}">Agregar cliente</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{route('servicios.index')}}">Lista de servicios</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{route('servicios.create')}}">Agregar servicio</a>
    </div>
  </li>
</ul>