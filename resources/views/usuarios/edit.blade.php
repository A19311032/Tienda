@extends('layouts.app')
@section('content')
<div class="row" style="margin:10px; margin-top:5px;">
    <p style="font-size: 20px; font-weight: bold; color: #6f6f6f; margin: 0px"><span class="material-symbols-outlined sub">edit</span>Editar Usuario</p>
    <div class="col-12" style="padding: 5px">
        <div style="background-color: white; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 10px; border-radius: 10px;">
            <p style="font-size: 20px; color: #992323;margin-bottom:0">Formulario para edición de usuario.</p>
            <p style="color: #6f6f6f; margin-top:0">Modifique los datos que desee y pulse guardar.</p><br>
            <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT') 
                <div class="row">
                    <div class="col-4">
                        <label for="name">Nombres:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" style="text-transform: uppercase;">
                    </div>
                    <div class="col">
                        <label for="apellido_paterno">Apellido Paterno:</label>
                        <input type="text" name="apellido_paterno" class="form-control" id="apellido_paterno" value="{{ $user->apellido_paterno }}" style="text-transform: uppercase;">
                    </div>
                    <div class="col-4">
                        <label for="apellido_materno">Apellido Materno:</label>
                        <input type="text" name="apellido_materno" class="form-control" id="apellido_materno" value="{{ $user->apellido_materno }}" style="text-transform: uppercase;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="email">Correo:</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                    </div>
                    <div class="col-4">
                        <label for="celular">Celular:</label>
                        <input type="text" name="celular" class="form-control" id="celular" value="{{ $user->celular }}" style="text-transform: uppercase;">
                    </div>
                    <div class="col-4">
                        <label for="estatus">Estatus:</label>
                        <select name="estatus" class="form-control" id="estatus">
                            <option value="Activo" {{ $user->estatus == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ $user->estatus == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="rol">Rol:</label>
                        <select name="rol" class="form-control" id="rol" style="text-transform: uppercase">
                            @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>                                      
                </div>
                <br>
                <div style="text-align: end">
                    <a href="/usuarios" class="btn btn-outline-secondary">Regresar</a>
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
