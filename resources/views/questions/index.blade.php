@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Administrar Preguntas</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tblquestions">
                        <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Pregunta</th>
                            <th class="text-center">Respuesta</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{$question->id}}</td>
                                <td>{{$question->question}}</td>
                                <td>{{$question->answer}}</td>
                                <td class="text-center">
                                    <a href="{{route('questions.edit',$question->id)}}" class="btn btn-warning text-white"><span class="fa fa-edit"></span></a>
                                </td>
                                <td class="text-center">
                                        <form action="{{route('questions.destroy', $question ->id)}}" method="POST" class="borrar" title="Eliminar Administrador">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" type="submit"> <span class="fas fa-trash" ></span> </button>
                                        </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Botonera-->
            <div class="col-12 text-center">
                <a href="{{route('home')}}" class="btn btn-info">Regresar</a>
            </div>
        </div>
    </div>
@stop
@section('plugins.Datatables', true)
@section('js')

    @toastr_css
    @toastr_js
    @toastr_render
    <script>

        $(document).ready(function(){

            //Revisamos que tenga un mensaje de éxito o error


            //Función para eliminar a un usuario
            $('.borrar').click(function(e){
                e.preventDefault();
                var form=$(this);
                Swal.fire({
                    title: '¿Seguro que desea eliminar la Pregunta?',
                    text: "Este proceso eliminará la pregunta en el sistema y es irreversible.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: '<span class="fas fa-trash"></span>&nbsp;Eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.value) {
                        form.submit();
                    }
                })

            });
            //Iniciamos el dataTable
            $('#tblquestions').DataTable({
                "columnDefs": [

                    { "orderable": false, "targets": [3,4] }
                ],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
@stop
