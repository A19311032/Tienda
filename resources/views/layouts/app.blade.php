<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/ico" href="{{ asset('images/logo.png') }}">

    <title>SneakerHMO</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Custom Styles -->
    <style>
        .nav-link{
            color: black;
            font-size: 115%;

        }
        .nav-link:hover{
            color: #AB1B1A;
        }
        body {
            background-image: url("{{ asset('images/bg.jpg') }}");
        }
        .sub{
            color:#a43227;
            font-size: 120%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .indice{
            color: #AB1B1A;
            font-size: 150%;
            vertical-align: middle;
            margin-right: 2px;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #F1F1F1 !important; border-bottom: 3px solid #000000; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" style="width: 80px" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @auth
                            <!-- Mostrar todos los elementos del menú solo cuando el usuario ha iniciado sesión -->
                            <li class="nav-item">
                            </li>
                            @if(auth()->user() && (auth()->user()->hasRole('Administrador') ))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="material-symbols-outlined indice">clinical_notes</span>Sneakers</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('ventas.index') }}"><span class="material-symbols-outlined sub">calendar_month</span>Ventas</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('usuarios.index') }}"><span class="material-symbols-outlined sub">group</span>Usuarios</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endauth
                    </ul>
                    @auth
                        <!-- Añade el botón "Cerrar Sesión" alineado a la derecha -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown" style="margin-right: 20px">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-transform:capitalize">
                                    <span class="material-symbols-outlined indice">account_circle</span>
                                    {{ auth()->user()->name }} {{ auth()->user()->apellido_paterno }}
                                </a>
                                <ul class="dropdown-menu" style="margin-right: 10px">
                                    <li class="nav-item"  style="margin-right: 10px">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer; color:#992323"  style="font-size: 100%">
                                                <span class="material-symbols-outlined indice" style="color:#992323">logout</span>
                                                Cerrar Sesión
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
    <!-- Bootstrap JS and other script tags -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
