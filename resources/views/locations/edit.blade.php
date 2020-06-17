@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1 class="text-center">Editar Localidad</h1>
@stop

@section('content')
    <form action="{{route('locations.update',$location->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" value="{{$location->lat}}" name="lat" id="lat">
        <input type="hidden" value="{{$location->lng}}" name="lng" id="lng">
        <div class="row">
            <div class="col-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="name">Nombre*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="ej. Progreso" maxlength="500" value="{{$location->name}}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="state_id">Estado*</label>
                            <select class="form-control" name="state_id" id="state_id" required>
                                <option value="">Seleccione...</option>
                                @foreach($states as $state)
                                    @if($state->id==$location->state_id)
                                        <option value="{{$state->id}}" selected>{{$state->name}}</option>
                                    @else
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="image">Imagen (max:2048 px)*</label>
                            <input type="file" id="image" name="image" >
                            <img src="{{url('https://wediscoverfinal.s3.amazonaws.com/'.$location->image)}}" class="img-thumbnail" width="100" />
                            <input type="hidden" name="hidden_image" value="{{ $location->image }}" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group" style="width: 100%;height: 300px; border-radius: 4px;">
                            {!!Mapper::render()!!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="short_description">Descripción Corta*</label>
                            <input type="text" name="short_description" id="short_description" class="form-control" placeholder="ej. Puerto más importante de Yucatán" maxlength="500" value="{{$location->short_description}}" required>
                        </div>
                    </div>
                    <!--Diferentes áreas de texto-->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea name="description" id="description" class="form-control">{!! $location->description !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="biodiversity">Biodiversidad</label>
                            <textarea name="biodiversity" id="biodiversity" class="form-control">{!! $location->biodiversity !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="environmental">Ambiente</label>
                            <textarea name="environmental" id="environmental" class="form-control">{!! $location->environmental !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="culture">Cultura</label>
                            <textarea name="culture" id="culture" class="form-control">{!! $location->culture !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="archeology">Arqueología</label>
                            <textarea name="archeology" id="archeology" class="form-control">{!! $location->archeology !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="history">Historia</label>
                            <textarea name="history" id="history" class="form-control">{!! $location->history !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="economy">Economía</label>
                            <textarea name="economy" id="economy" class="form-control">{!! $location->economy !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="sustainable_development">Desarrollo Sustentable</label>
                            <textarea name="sustainable_development" id="sustainable_development" class="form-control">{!! $location->sustainable_development !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="demography">Demografía</label>
                            <textarea name="demography" id="demography" class="form-control">{!! $location->demography !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="gastronomy">Gastronomía</label>
                            <textarea name="gastronomy" id="gastronomy" class="form-control">{!! $location->gastronomy !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="biblio">Atractivos Turísticos</label>
                            <textarea name="biblio" id="biblio" class="form-control">{!! $location->biblio!!}</textarea>
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
@section('js')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('biodiversity');
        CKEDITOR.replace('environmental');
        CKEDITOR.replace('culture');
        CKEDITOR.replace('archeology');
        CKEDITOR.replace('history');
        CKEDITOR.replace('economy');
        CKEDITOR.replace('sustainable_development');
        CKEDITOR.replace('demography');
        CKEDITOR.replace('gastronomy');
        CKEDITOR.replace('biblio');
        //Captura las coordenadas de donde se soltó el mapa
        function coordenadas(mapas) {
            $('#lat').val(mapas[0].markers[0].getPosition().lat());
            $('#lng').val(mapas[0].markers[0].getPosition().lng());
            console.log($('#lat').val());
            console.log($('#lng').val());
        }
    </script>
@stop
