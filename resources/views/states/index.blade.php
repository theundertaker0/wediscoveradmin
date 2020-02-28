@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Administrar Estados</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tblStates">
                        <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Nombre Corto</th>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Ver</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($states as $state)
                            <tr>
                                <td>{{$state->id}}</td>
                                <td>{{$state->name}}</td>
                                <td>{{$state->short_name}}</td>
                                <td class="text-center"><img src="{{ asset('/images/states/'.$state->image) }}" class="img-thumbnail" width="75" /></td>
                                <td class="text-center">
                                    <a href="{{route('states.show',$state->id)}}" class="btn btn-secondary text-white"><span class="fa fa-eye"></span></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('states.edit',$state->id)}}" class="btn btn-warning text-white"><span class="fa fa-edit"></span></a>
                                </td>
                                <td class="text-center">
                                        <form action="{{route('states.destroy', $state ->id)}}" method="POST" class="borrar" title="Eliminar Administrador">
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
                    title: '¿Seguro que desea eliminar el Estado?',
                    text: "Este proceso eliminará todas las localidades asociadas a este Estado en el sistema y es irreversible.",
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
            $('#tblStates').DataTable({
                "columnDefs": [

                    { "orderable": false, "targets": [4,5,6] }
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
