@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Nueva Pregunta Frecuente</h1>
@stop

@section('content')
    <form action="{{route('questions.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="question">Pregunta*</label>
                            <input type="text" name="question" id="question" class="form-control" placeholder="ej. Como acceder a mis cuenta" maxlength="500" required>
                        </div>
                    </div>


                    <!--Áreas de texto para respuestas-->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="answer">Respuesta*</label>
                            <textarea name="answer" id="answer" class="form-control" required></textarea>
                        </div>
                    </div>

                    <!-- Botonera -->
                    <div class="col-12 text-center">
                        <a href="{{route('questions.index')}}" class="btn btn-danger">Cancelar</a>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

