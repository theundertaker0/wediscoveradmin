@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Editar Definición del Glosario</h1>
@stop

@section('content')
    <form action="{{route('definitions.update',$definition->id)}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="word">Palabra*</label>
                            <input type="text" name="word" id="word" class="form-control" placeholder="ej. Botánica" maxlength="250" required value="{{$definition->word}}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="definition">Definición*</label>
                            <textarea name="definition" id="definition" class="form-control" required>{{$definition->definition}}
                            </textarea>
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
@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
@stop
