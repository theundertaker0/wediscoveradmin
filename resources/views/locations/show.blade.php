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
                <img class="card-img-top" src="{{url('https://wediscoverfinal.s3.amazonaws.com/'.$location->image)}}" alt="Card image cap">
                <div class="card-title text-center bg-primary">
                    <h4 class="text-bold">{{$location->name}}</h4>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="text-bold"> Estado:</p>
                        <p>{{$location->state->name}}</p>
                    </li>
                    <li class="list-group-item">
                        <div class="col-12">
                            <div class="form-group" style="width: 100%;height: 300px; border-radius: 4px;">
                                {!!Mapper::render()!!}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Descripción Corta:</p>
                        <p>{!!$location->short_description!!}</p>
                    </li>

                    <li class="list-group-item">
                        <p class="text-bold"> Descripción:</p>
                        <p>{!!$location->description!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Biodiversidad:</p>
                        <p>{!!$location->biodiversity!!}</p>
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
                    <li class="list-group-item">
                        <p class="text-bold"> Atractivos Turísticos:</p>
                        <p>{!!$location->biblio!!}</p>
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
