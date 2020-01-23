@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Bienvenido al Escritorio del Administrador de WeDiscover</h1>
    <div class="text-center">
        <img src="{{asset('img/logowediscover.png')}}" alt="Logo WeDiscover" style="max-width: 320px">
    </div>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-bold">Escritorio de Administrador de la Plataforma WeDiscover</div>

                <div class="card-body text-center">
                   Utilice el menú de la izquierda para navegar entre las opciones disponbles
                </div>
            </div>
        </div>
    </div>
</div>
@stop
