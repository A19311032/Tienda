@extends('layouts.app')

@section('content')
<div class="row justify-content-center" style="margin:10px; margin-top:5px;">
    <div class="col-md-6">
        <div class="text-center">
            <a class="navbar-brand" href="#"><img src="{{ asset('images/surfel.jpg') }}" style="width: 100px"></a>
        </div>
        <br>
        <div class="card">
            <div class="card-header text-center" style="font-size: 20px; font-weight: bold;">
                Registrarse
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" class="form-control" id="name" style="text-transform: uppercase;" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_paterno">Apellido Paterno:</label>
                        <input type="text" name="apellido_paterno" class="form-control" id="apellido_paterno" style="text-transform: uppercase;">
                    </div>
                    <div class="form-group">
                        <label for="apellido_materno">Apellido Materno:</label>
                        <input type="text" name="apellido_materno" class="form-control" id="apellido_materno" style="text-transform: uppercase;">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" class="form-control" id="password" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="new-password">
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                    <div class="text-center" style="margin-top: 10px;">
                        <a href="/" class="btn btn-link">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
