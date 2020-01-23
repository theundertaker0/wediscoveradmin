@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Nueva Localidad</h1>
@stop

@section('content')
    <form action="{{route('locations.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="name">Nombre*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="ej. Progreso" maxlength="500" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="state_id">Estado*</label>
                            <select class="form-control" name="state_id" id="state_id" required>
                                <option value="">Seleccione...</option>
                                @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="short_description">Descripción Corta*</label>
                            <input type="text" name="short_description" id="short_description" class="form-control" placeholder="ej. Puerto más importante de Yucatán" maxlength="500" required>
                        </div>
                    </div>
                    <!--Diferentes áreas de texto-->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="biodiversity">Biodiversidad</label>
                            <textarea name="biodiversity" id="biodiversity" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="environmental">Ambiental</label>
                            <textarea name="environmental" id="environmental" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="culture">Cultura</label>
                            <textarea name="culture" id="culture" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="archeology">Arqueología</label>
                            <textarea name="archeology" id="archeology" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="history">Historia</label>
                            <textarea name="history" id="history" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="economy">Economía</label>
                            <textarea name="economy" id="economy" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="sustainable_development">Desarrollo Sustentable</label>
                            <textarea name="sustainable_development" id="sustainable_development" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="demography">Demografía</label>
                            <textarea name="demography" id="demography" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="gastronomy">Gastronomía</label>
                            <textarea name="gastronomy" id="gastronomy" class="form-control"></textarea>
                        </div>
                    </div>
                    <!-- Botonera -->
                    <div class="col-12 text-center">
                        <a href="{{route('locations.index')}}" class="btn btn-danger">Cancelar</a>
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
