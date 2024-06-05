@extends('layouts.app')

@section('content')
<style>
  body {
    font-family: 'Nunito', sans-serif; /* Tipografía moderna y legible */
    background-color: #f4f7f6; /* Fondo suave para la página */
    color: #5D5D5D; /* Color principal de texto */
  }
  
  .table {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  thead {
    background-color: #eaeaea;
  }

  th, td {
    color: #333;
    text-transform: capitalize;
    vertical-align: middle;
  }

  .pagination {
    justify-content: center;
  }

  .pagination li a {
    border-radius: 50%;
    margin: 0 5px;
  }

  .pagination li.active a,
  .pagination li a:hover {
    background-color: #4A90E2;
    color: white;
  }

  .btn {
    border-radius: 20px;
    padding: 5px 15px;
  }

  .btn-warning {
    background-color: #FFC107;
    border: none;
  }

  .btn-success {
    background-color: #28A745;
    border: none;
  }

  .form-control {
    border-radius: 20px;
    box-shadow: none;
  }

  .icon-text {
    display: flex;
    align-items: center;
    font-size: 24px;
    color: #4A90E2;
  }

  .icon-text .material-symbols-outlined {
    font-size: 28px;
    margin-right: 10px;
  }

  .header-title {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
  }

  .sub-text {
    color: #6f6f6f;
    margin-top: 0;
  }

  .btn-new-user {
    background-color: #28A745;
    color: white;
    border: none;
    border-radius: 20px;
    padding: 10px 20px;
    margin-bottom: 15px;
    transition: background-color 0.3s ease;
  }

  .btn-new-user:hover {
    background-color: #218838;
  }
  .search-button {
    margin-left: 20px; 
  }
  .productos-title {
  color: #000000; 
}
.action-cell {
    text-align: center;
}
/* Estilo para las celdas con imágenes */
.imagen img {
    width: 100px; 
    height: auto; 
}

</style>

<div class="container mt-4">
  <div class="row">
    <div class="col-12">
      <div class="icon-text">
        <span class="material-symbols-outlined sub">group</span>
        <span class="productos-title">Productos</span>
      </div>
      <p class="header-title">Listado de Productos</p>
      <p class="sub-text">A continuación se muestra el listado de todos los productos registrados</p>
      
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Buscar productos..." aria-label="Buscar productos">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary search-button" type="button" id="button-addon2">Buscar</button>
        </div>
      </div> 

      <a href="{{ route('ventas.create') }}" class="btn btn-success">
        <span class="material-symbols-outlined">add</span> Nuevo Producto
      </a>
      <br>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th class="imagen">Imagen</th>
            <th>Descripcion</th>
            <th>Talla</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Estado</th>

            <th class="action-cell">Acción</th> 
          </tr>
        </thead>
        <tbody>
          @foreach($ventas as $venta)
            <tr>
              <th>{{ $venta->id }}</th>
              <td class="imagen"><img src="{{ asset('images/' . $venta->imagen) }}" alt="Imagen de venta"></td>
              <td>{{ $venta->descripcion }}</td>
              <td>{{ $venta->talla }}</td>
              <td>{{ $venta->precio }}</td>
              <td>{{ $venta->cantidad }}</td>  
              <td>{{ $venta->estado }}</td>  
              <td class="action-cell"> <!-- Aplicar la clase a la celda de acción -->
                  <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-sm btn-warning">Editar</a>
                  <form action="{{ route('ventas.eliminar', $venta->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta venta?')">Eliminar</button>
                  </form>
              </td>                      
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $ventas->links() }}
    </div>
  </div>
</div>
@endsection
