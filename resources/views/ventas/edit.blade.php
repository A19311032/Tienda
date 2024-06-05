@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="row" style="margin: 10px; margin-top: 5px;">
    <!-- Formulario para edición de cliente existente -->
    <p class="icon-text">
        <span class="material-symbols-outlined sub">edit</span>
        Editar Producto
    </p>
    <div class="col-12" style="padding: 5px;">
        <div style="background-color: white; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 10px; border-radius: 10px;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <p style="font-size: 20px; color: #125e2b; margin-bottom: 0;">Formulario para edición de producto existente.</p>
            </div>
            <p style="color: #6f6f6f; margin-bottom: 0;">En el siguiente formulario, puede editar los datos del producto.</p><br>
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-top: 0; margin-bottom: 15px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
                @csrf
                @method('PUT') 

                <div class="row">
                    <div class="col-2">
                        <label for="marca">Marca:</label>
                        <input type="text" name="marca" class="form-control" id="marca" style="text-transform: uppercase;" value="{{ old('marca', $venta->marca) }}">
                    </div>
                    <div class="col-2">
                        <label for="silueta">Silueta:</label>
                        <input type="text" name="silueta" class="form-control" id="silueta" style="text-transform: uppercase;" value="{{ old('silueta', $venta->silueta) }}">
                    </div>
                    <div class="col-2">
                        <label for="modelo">Modelo:</label>
                        <input type="text" name="modelo" class="form-control" id="modelo" style="text-transform: uppercase;" value="{{ old('modelo', $venta->modelo) }}">
                    </div>
                    <div class="col-2">
                        <label for="talla">Talla:</label>
                        <input type="numeric" name="talla" class="form-control" id="talla" style="text-transform: uppercase;" value="{{ old('talla', $venta->talla) }}">
                    </div>
                    <div class="col-2">
                        <label for="estado">Estado:</label>
                        <select name="estado" class="form-control" id="estado" style="text-transform: uppercase;" value="{{ old('marca', $venta->estado) }}">
                            <option value="Nuevo" {{ $venta->estado == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
                            <option value="Usado" {{ $venta->estado == 'Usado' ? 'selected' : '' }}>Usado</option>
                        </select>
                    </div>
                    <div class="col-2" id="condicion-div" style="display: none;">
                        <label for="condicion">Condicion:</label>
                        <select name="condicion" class="form-control" id="condicion" style="text-transform: uppercase;">
                            <option value="Noventa" {{ $venta->condicion == 'Noventa' ? 'selected' : '' }}>90 %</option>
                            <option value="Ochenta" {{ $venta->condicion == 'Ochenta' ? 'selected' : '' }}>80 %</option>
                            <option value="Setenta" {{ $venta->condicion == 'Setenta' ? 'selected' : '' }}>70 %</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="cantidad">Cantidad:</label>
                        <input type="numeric" name="cantidad" class="form-control" id="cantidad" style="text-transform: uppercase;" value="{{ old('cantidad', $venta->cantidad) }}">
                    </div>
                    <div class="col-2">
                        <label for="precio">Precio:</label>
                        <input type="numeric" name="precio" class="form-control" id="precio" style="text-transform: uppercase;" value="{{ old('precio', $venta->precio) }}">
                    </div>
                    <div class="col-3">
                        <label for="imagen">Imagen del Producto:</label>
                        <input type="file" name="imagen" class="form-control" id="imagen" value="{{ old('imagen', $venta->imagen) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" style="text-transform: uppercase;" value="{{ old('descripcion', $venta->descripcion) }}">
                    </div>
                </div>
                <br>
                <div style="text-align: end">
                    <a href="/ventas" class="btn btn-outline-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Actualizar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var estadoSelect = document.getElementById('estado');
        var condicionDiv = document.getElementById('condicion-div');

        estadoSelect.addEventListener('change', function () {
            condicionDiv.style.display = this.value === 'Usado' ? 'block' : 'none';
        });
    });
</script>


@endsection
