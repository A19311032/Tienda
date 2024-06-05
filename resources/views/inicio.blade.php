@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Figtree', sans-serif; /* Se usa una tipografía moderna */
        color: #5D5D5D; /* Se establece un color de texto principal */
        margin-top: 0px;
    }
    .icon-text {
        display: flex;
        align-items: center;
        font-size: 24px; /* Se aumenta el tamaño para una mejor lectura */
        color: #4A90E2; /* Un color azul moderno para los iconos y el texto */
        margin-bottom: 10px;
    }
    .icon-text .material-symbols-outlined {
        font-size: 30px; /* Se aumenta el tamaño de los íconos para que coincidan con el texto */
        margin-right: 10px;
        color: #AD1B1A;
    }
    .card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Una sombra suave para un efecto 'elevado' */
        margin-bottom: 20px;
        padding: 20px;
        transition: all 0.3s ease-in-out; /* Transición suave para efectos de hover */
    }
    .card:hover {
        transform: translateY(-5px); /* Eleva la tarjeta ligeramente al hacer hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Sombras más pronunciadas al hacer hover */
    }
    .user-info {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .user-info img {
        border-radius: 50%; /* Imagen redonda para la foto de perfil */
        margin-right: 15px;
        width: 60px; /* Tamaño fijo para la imagen */
        height: 60px; /* Tamaño fijo para la imagen */
    }
    .user-info p {
        margin: 0;
        line-height: 1.2; /* Espaciado entre líneas para una mejor legibilidad */
    }
    .user-info .user-name {
        font-size: 20px;
        font-weight: 600; /* Negrita para el nombre del usuario */
        color: #333; /* Color más oscuro para el nombre para destacar */
    }
    .icon-text {
        display: flex;
        align-items: center;
        font-size: 24px;
        margin-bottom: 10px;
    }

    /* Estilo para el texto 'Inicio' */
    .icon-text .home-text {
        color: #000000; /* Cambia este valor al color deseado para el texto 'Inicio' */
    }
    table {
    width: 100%; /* Ajusta el ancho según tus necesidades */
    border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd; /* Borde de las celdas */
        padding: 8px; /* Espaciado dentro de las celdas */
    }

    th {
        text-align: left; /* Alineación del texto en los encabezados */
        background-color: #f2f2f2; /* Color de fondo para los encabezados */
    }

</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="icon-text">
                <span class="material-symbols-outlined sub">home</span>
                <span class="home-text">Inicio</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="user-info">
                    <img src="{{ asset('images/hasbulla.png') }}" alt="User Profile Image">
                    <div>
                        <p class="user-name">{{ auth()->user()->name }} {{ auth()->user()->apellido_paterno }} {{ auth()->user()->apellido_materno }}</p>
                        <p>{{ Auth::user()->empresa }}</p>
                        <p>{{ date('d/m/Y') }}</p>
                        <p id="hora_actual"></p>
                    </div>
                </div>
                <p>Bienvenid@ a SneakerHMO.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <p style="font-size: 20px; color: #000000">Nueva Mercancia:</p>


            </div>
        </div>
    </div>
</div>

<script>
    function mostrarHoraActual() {
        var fecha = new Date();
        var hora = fecha.getHours();
        var minutos = fecha.getMinutes();
        var segundos = fecha.getSeconds();
        var amPm = hora >= 12 ? 'PM' : 'AM';
        // Asegurarnos de que los valores de minutos y segundos tengan dos dígitos
        minutos = (minutos < 10 ? "0" : "") + minutos;
        segundos = (segundos < 10 ? "0" : "") + segundos;
        // Convertir a formato de 12 horas y asegurarnos de que la hora tenga dos dígitos
        if (hora > 12) {
            hora = hora - 12;
        } else if (hora === 0) {
            hora = 12;
        }
        hora = (hora < 10 ? "0" : "") + hora;
        // Crear el formato hh:mm:ss AM/PM
        var horaActual = hora + ":" + minutos + ":" + segundos + " " + amPm;
        // Actualizar el contenido del elemento con el id "hora_actual"
        document.getElementById("hora_actual").textContent = horaActual;
    }
    // Llamar a la función inicialmente para mostrar la hora al cargar la página
    mostrarHoraActual();
    // Actualizar la hora cada segundo (1000 milisegundos)
    setInterval(mostrarHoraActual, 1000);
</script>
@endsection
