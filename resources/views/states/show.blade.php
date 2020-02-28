@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Ver Generales del Estado</h1>
@stop

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 col-md-8 offset-2">
            <div class="card">
                <img class="card-img-top" src="{{asset('images/states/'.$state->image)}}" alt="Card image cap">
                <div class="card-title text-center bg-primary">
                    <h4 class="text-bold">{{$state->name}}</h4>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="text-bold"> Nombre Corto:</p>
                        <p>{{$state->short_name}}</p>
                    </li>
                    <li class="list-group-item">
                        <div class="col-12">
                            <div class="form-group" style="width: 100%;height: 300px; border-radius: 4px;">
                                {!!Mapper::render()!!}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Teléfonos:</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">Policía: {{$state->police_number}}</li>
                            <li class="list-inline-item">Bomberos: {{$state->firemen_number}}</li>
                            <li class="list-inline-item">Médicina: {{$state->medical_number}}</li>
                            <li class="list-inline-item">Gobierno: {{$state->government_number}}</li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Descripción:</p>
                        <p>{!!$state->description!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Bioseguridad:</p>
                        <p>{!!$state->biosecurity!!}</p>
                    </li>
                    <li class="list-group-item">
                        <p class="text-bold"> Clima:</p>
                        <p>{!!$state->weather!!}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 text-center">
            <a href="{{route('states.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@stop
