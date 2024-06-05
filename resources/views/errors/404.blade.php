@extends('layouts.app')
@section('content')
<style>
  td{
    text-transform: uppercase;
  }

  .pagination > li > a {
        color: #a43227 !important;
    }

    /* Cambiar el color de fondo y el color del texto para el enlace activo */
    .pagination > li.active > a,
    .pagination > li.active > a:focus,
    .pagination > li.active > a:hover {
        background-color: #a43227 !important;
        border-color: #a43227 !important;
        color: white !important;
    }
    
    /* Cambiar el color de fondo de los enlaces al pasar el mouse (hover) */
    .pagination > li > a:hover {
        background-color: #a43227 !important;
        color: white !important; 
    }
</style>
<div class="row" style="margin:10px; margin-top:5px;">
    <p style="font-size: 20px; font-weight: bold; color: #6f6f6f; margin: 0px"><span class="material-symbols-outlined sub">error</span>Error 404</p>
    <div class="col-12" style="padding: 5px">
        <div style="background-color: white; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 10px; border-radius: 10px; text-align: center">
            <p style="font-weight:bold; color:#a43227; margin-bottom: 0px"><span class="material-symbols-outlined" style="font-size: 100px">error</span></p>
            <h1 style="font-weight:bold; color:#a43227">¡Ups!</h1><br>
            <p style="margin:0%">Parece que ocurrió un error.</p>
            <br><br>
            <p><b style="font-weight:bold; color:#a43227">Código de Error:</b> 404</p>
            
        </div>
    </div>
</div>
@endsection