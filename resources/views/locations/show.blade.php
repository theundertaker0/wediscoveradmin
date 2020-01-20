@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Ver Generales de la Localidad</h1>
@stop

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 col-md-8 offset-2">
            <div class="card">
                <div class="card-header text-center bg-primary">
                    <h4 class="text-bold">{{$location->name}}</h4>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="text-bold"> Estado:</p>
                        <p>{{$location->state->name}}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Descripción Corta:</p>
                        <p>{{$location->short_description}}</p>
                    </li>

                    <li class="list-group-item">
                        <p class="text-bold"> Descripción:</p>
                        <p>{!!$location->description!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Ecología:</p>
                        <p>{!!$location->ecology!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Ambiental:</p>
                        <p>{!!$location->environmental!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Cultura:</p>
                        <p>{!!$location->culture!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Arqueología:</p>
                        <p>{!!$location->archeology!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Historia:</p>
                        <p>{!!$location->history!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Economía:</p>
                        <p>{!!$location->economy!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Desarrollo Sustentable:</p>
                        <p>{!!$location->sustainable_development!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Demografía:</p>
                        <p>{!!$location->demography!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Gastronomía:</p>
                        <p>{!!$location->gastronomy!!}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 text-center">
            <a href="{{route('locations.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@stop
