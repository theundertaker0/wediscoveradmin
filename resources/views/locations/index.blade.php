@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Administrar Localidades</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tbllocations">
                        <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Ver</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locations as $location)
                            <tr>
                                <td>{{$location->id}}</td>
                                <td>{{$location->name}}</td>
                                <td>{{$location->state->name}}</td>
                                <td class="text-center">
                                    <a href="{{route('locations.show',$location->id)}}" class="btn btn-secondary text-white"><span class="fa fa-eye"></span></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{route('locations.edit',$location->id)}}" class="btn btn-warning text-white"><span class="fa fa-edit"></span></a>
                                </td>
                                <td class="text-center">
                                        <form action="{{route('locations.destroy', $location ->id)}}" method="POST" class="borrar" title="Eliminar Administrador">
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
                    title: '¿Seguro que desea eliminar la localidad?',
                    text: "Este proceso eliminará todos los datos de la  localidad en el sistema y es irreversible.",
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
            $('#tbllocations').DataTable({
                "columnDefs": [

                    { "orderable": false, "targets": [3,4,5] }
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
