@extends('layouts.adminLayout')

@section('styles')
 <link href="{{ asset('css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
 <!-- Image Picker -->
  <link href="{{ asset('css/image-picker.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/jPages.css') }}" rel="stylesheet" type="text/css" />
  <style>
  ul.thumbnails.image_picker_selector li{
    width: 30%;
  }
  ul.thumbnails.image_picker_selector{
    overflow: hidden;
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
  .articulo .carousel{
    height: 138px;
  }
  </style>
@stop

@section('content')
	<div class="row">
        <div class="col-xs-12">
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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Merchandising</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    {{ Form::open(array('method' => 'PATCH', 'route'=>['merchandising.update', $articulo->codArticulo])) }}
                    <div class="row">
                        <div class="col-xs-4">
                            <select name="tipoarticulo_id" id="tipoarticulo_id" class="form-control" required>
                                @foreach($tipoarticulos as $ta)
                                    @if ($ta->codTipoArticulo == $articulo->tipoarticulo_id)
                                      <option value="{{$ta->codTipoArticulo}}" selected>{{$ta->descripcion}}</option> 
                                    @else
                                      <option value="{{$ta->codTipoArticulo}}">{{$ta->descripcion}}</option> 
                                    @endif
                                @endforeach
                            </select><br>
                            
                            <input placeholder="Nombre del Articulo" class="form-control" required="required" name="nombArticulo" type="text" value="{{$articulo->nombArticulo}}"><br>

                             <input id="precio" placeholder="Precio" class="form-control" required="required" name="precio" type="text" style="text-align: right;" value="{{$articulo->precio}}"><br>

                            <textarea placeholder="Descripción" rows="3" maxlength="50" class="form-control" required="required" name="descripcion" cols="50">{{$articulo->descripcion}}</textarea>
                            <br>

                            <select name="activo" id="activo" class="form-control" required>
                              @if ($articulo->activo == 1)
                                <option value="1" selected>Activado</option>
                                <option value="0">Desactivado</option>
                              @else
                                <option value="1">Activado</option>
                                <option value="0" selected>Desactivado</option>
                              @endif
                            </select>
                            <br>
                            {{ Form::submit('Editar', array('class'=>'btn btn-success')) }}
                        </div>
                        <div class="col-xs-8">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">
                                    Seleccionar Imagenes del Articulo
                                    </h3>
                                </div>
                                <div class="box-body" style="max-height: 400px;overflow:scroll">

                                    <?php 
                                    $imgs = [];
                                      foreach ($articulo->Imagen as $img) {
                                        array_push($imgs,$img->codImagen);
                                      }
                                     ?>
                                    <select name="imagenes[]" id="gat" class="image-picker masonry" multiple="multiple" required>
                                        @foreach($imagenes as $imagen)

                                          @if(in_array($imagen->codImagen, $imgs))
                                              <option data-img-src="/TAP/tap/public/uploads/{{$imagen->imagen_archivo}}" value="{{$imagen->codImagen}}" selected>{{$imagen->descripcion}}</option>
                                          @else
                                              <option data-img-src="/TAP/tap/public/uploads/{{$imagen->imagen_archivo}}" value="{{$imagen->codImagen}}">{{$imagen->descripcion}}</option>
                                          @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop

@section("scripts")
  <!-- DATA TABES SCRIPT -->
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
         <!-- InputMask -->
        <script src="{{ asset('js/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/input-mask/jquery.inputmask.numeric.extensions.js') }}" type="text/javascript"></script>

        <!-- Image picker -->
        <script src="{{ asset('js/image-picker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/masonry.pkgd.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jPages.min.js') }}" type="text/javascript"></script>
        
<script>
    $(document).ready(function() {
        $("#precio").inputmask({ alias: "currency"});
        $("#gat").imagepicker();
        
    var $container = $("select.image-picker.masonry").next("ul.thumbnails");
    setTimeout(function(){

    $container.masonry({
        itemSelector:   "li",
        show_label: true
    });
},1000);
         $("div.holder").jPages({
            containerID : "listas",
            perPage: 5
          });
         $('.carousel').carousel();
    });
</script>
@stop