@extends('layouts.adminLayout')

@section('styles')
        <!-- Image Picker -->
        <link href="{{ asset('css/image-picker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/jPages.css') }}" rel="stylesheet" type="text/css" />
        <!-- Image Uploader -->
        <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/basic.css') }}" rel="stylesheet" type="text/css" />
        <style>
        tr{
        	cursor: pointer;	
        }
        .file-row div{
            display: inline-block;
        }
          .holder a{
            border: 1px solid #eee;
            padding: 5px;
            border-radius: 3px;
          }
          .articulo{
            max-width: 150px;
            border: 1px solid #666;
            border-radius: 3px;
            padding: 5px;
            list-style: none; 
            text-align: center;
            display: inline-block;
          }
          .articulo h4{
            word-break: break-all;
          }
          #listas li{
            display: inline-block;
            max-width: 150px;
          }
        </style>
@stop

@section('content')
	<div class="row">
          @if(Session::has('mensaje'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>
                    {{Session::get('mensaje')}}
                    <?php  
                        Session::forget('mensaje')
                    ?>
                </strong> 
            </div>
            @endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Todas las Imagenes</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <div class="holder"></div>
                   <ul id="listas">
                        @foreach ($imagenes as $imagen)
                            <li>
                                {{ Form::open(array('url' => 'imagen/' . $imagen->codImagen)) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    <button class="close">x</button>
                                {{ Form::close() }}
                               <img src="/TAP/tap/public/uploads/{{$imagen->imagen_archivo}}" alt="" class="img-thumbnail">
                            </li>
                        @endforeach
                   </ul>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        <!-- AGREGAR -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Subir Imagenes</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <h4>Escoge el tipo de imagen</h4>
                    <br>
                    <form action="{{ url('imagen/subir')}}" class="dropzone" id="my-awesome-dropzone">
                        <select name="tipoimagen" id="tipoimagen" class="form-control">
                            @foreach ($tipoimagen as $ti)
                                <option value="{{$ti->id}}">{{$ti->nombre}}</option>
                            @endforeach
                        </select>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

@stop

@section("scripts")
    <!-- IMAGE UPLOADER -->
    <script src="{{ asset('js/dropzone.min.js') }}" type="text/javascript"></script>

        <!-- Image picker -->
        <script src="{{ asset('js/image-picker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/masonry.pkgd.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jPages.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function() {
    var tipo = $('#tipoimagen').val();
    $('#tipoimagen').change(function(){
        tipo = $(this).val();
    });

    $('form').on('submit', function(){
        return confirm('¿Está seguro de esta acción?');
    });
    Dropzone.options.myAwesomeDropzone = {
      headers: {'tipoimagen': tipo} // The name that will be used to transfer the file
    };
    setTimeout(function(){
        $container.masonry({
            itemSelector:   "li",
            show_label: true
        });
    },1000);
         $("div.holder").jPages({
            containerID : "listas",
            perPage: 12
          });
});
</script>
@stop