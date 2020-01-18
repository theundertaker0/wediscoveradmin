@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Nuevo Estado</h1>
@stop

@section('content')
    <form action="{{route('states.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12 col-md-10">
                        <div class="form-group">
                            <label for="name">Nombre*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="ej. Yucatán" maxlength="200" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="short_name">Nombre Corto</label>
                            <input type="text" name="short_name" id="short_name" class="form-control" placeholder="ej. YN" maxlength="20">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <h4>Números de Emergencia</h4>
                    </div>
                    <!-- Números telefónicos -->
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="police_number">Policía</label>
                            <input type="text" name="police_number" id="police_number" class="form-control" placeholder="ej. 9999999999" maxlength="20" minlength="10" pattern="[0-9]+">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="firemen_number">Bomberos</label>
                            <input type="text" name="firemen_number" id="firemen_number" class="form-control" placeholder="ej. 9999999999" maxlength="20" minlength="10" pattern="[0-9]+">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="medical_number">Servicios Médicos</label>
                            <input type="text" name="medical_number" id="medical_number" class="form-control" placeholder="ej. 9999999999" maxlength="20" minlength="10" pattern="[0-9]+">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="government_number">Gobierno</label>
                            <input type="text" name="government_number" id="government_number" class="form-control" placeholder="ej. 9999999999" maxlength="20" minlength="10" pattern="[0-9]+">
                        </div>
                    </div>
                    <!--Áreas de texto para biodiversidad y clima-->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="biosecurity">Bioseguridad</label>
                            <textarea name="biosecurity" id="biosecurity" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="weather">Recomendaciones climáticas</label>
                            <textarea name="weather" id="weather" class="form-control"></textarea>
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
@section('adminlte_js')
        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
@stop
