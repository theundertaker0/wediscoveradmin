@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Nueva Definición para el Glosario</h1>
@stop

@section('content')
    <form action="{{route('definition.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="word">Palabra*</label>
                            <input type="text" name="word" id="word" class="form-control" placeholder="ej. Botánica" maxlength="250" required>
                        </div>
                    </div>


                    <!--Áreas de texto para respuestas-->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="definition">Definicion*</label>
                            <textarea name="definition" id="definition" class="form-control" required></textarea>
                        </div>
                    </div>

                    <!-- Botonera -->
                    <div class="col-12 text-center">
                        <a href="{{route('definitions.index')}}" class="btn btn-danger">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

