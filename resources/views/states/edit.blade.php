@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Editar Estado</h1>
@stop

@section('content')
    <form action="{{route('states.update',$state->id)}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12 col-md-10">
                        <div class="form-group">
                            <label for="name">Nombre*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="ej. Yucatán" maxlength="200" required value="{{$state->name}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="short_name">Nombre Corto</label>
                            <input type="text" name="short_name" id="short_name" class="form-control" placeholder="ej. YN" maxlength="20" value="{{$state->short_name}}">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <h4>Números de Emergencia</h4>
                    </div>
                    <!-- Números telefónicos -->
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="police_number">Policía</label>
                            <input type="text" name="police_number" id="police_number" class="form-control" placeholder="ej. 9999999999" maxlength="20" minlength="10" pattern="[0-9]+" value="{{$state->police_number}}">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="firemen_number">Bomberos</label>
                            <input type="text" name="firemen_number" id="firemen_number" class="form-control" placeholder="ej. 9999999999" maxlength="20" minlength="10" pattern="[0-9]+" value="{{$state->firemen_number}}">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="medical_number">Servicios Médicos</label>
                            <input type="text" name="medical_number" id="medical_number" class="form-control" placeholder="ej. 9999999999" maxlength="20" minlength="10" pattern="[0-9]+" value="{{$state->medical_number}}">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="government_number">Gobierno</label>
                            <input type="text" name="government_number" id="government_number" class="form-control" placeholder="ej. 9999999999" maxlength="20" minlength="10" pattern="[0-9]+" value="{{$state->government_number}}">
                        </div>
                    </div>
                    <!--Áreas de texto para biodiversidad y clima-->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="biosecurity">Bioseguridad</label>
                            <textarea name="biosecurity" id="biosecurity" class="form-control">
                                {!! $state->biosecurity !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="weather">Recomendaciones climáticas</label>
                            <textarea name="weather" id="weather" class="form-control">
                                {!! $state->weather !!}
                            </textarea>
                        </div>
                    </div>

                    <!-- Botonera -->
                    <div class="col-12 text-center">
                        <a href="{{route('states.index')}}" class="btn btn-danger">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@section('js')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('biosecurity');
        CKEDITOR.replace('weather');
    </script>
@stop
