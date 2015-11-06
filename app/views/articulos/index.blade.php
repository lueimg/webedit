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
  .item img{
    height: 138px !important;
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
                    <div class="holder"></div>
                    <ul id="listas">
                        @foreach ($articulos as $articulo)
                            <li class="articulo">

                                <div id="c{{$articulo->codArticulo}}" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php 
                                                $i = 0;
                                             ?>
                                            @foreach($articulo->Imagen as $imagen)
                                                @if($i==0)
                                                    <div class="item active">
                                                        <img src="/TAP/tap/public/uploads/{{$imagen->imagen_archivo}}" alt="{{$imagen->descripcion}}">
                                                        <div class="carousel-caption">
                                                            {{$imagen->descripcion}}
                                                        </div>
                                                    <?php 
                                                        $i=1;
                                                     ?>
                                                    </div>
                                                @else
                                                    <div class="item">
                                                    <img src="/TAP/tap/public/uploads/{{$imagen->imagen_archivo}}" alt="{{$imagen->descripcion}}">
                                                        <div class="carousel-caption">
                                                            {{$imagen->descripcion}}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <a class="left carousel-control" href="#c{{$articulo->codArticulo}}" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#c{{$articulo->codArticulo}}" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                </div>
                                <h4>{{$articulo->nombArticulo}}</h4>
                                <h4><strong>$ {{$articulo->precio}}</strong></h4>
                                <div style="padding:4px 0px 10px 0;">
                                    <a href="merchandising/{{$articulo->codArticulo}}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></a>

                                    {{ Form::open(array('url' => 'merchandising/' . $articulo->codArticulo, 'style'=>'display:inline')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        {{ Form::close() }}
                                </div>
                                
                            </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                    Agregar Nuevo Articulo
                    </h3>
                </div>
                <div class="box-body">
                    {{ Form::open(array('url'=>'merchandising', 'method' => 'POST')) }}
                    <div class="row">
                        <div class="col-xs-4">
                            <select name="tipoarticulo_id" id="tipoarticulo_id" class="form-control" required>
                                @foreach($tipoarticulos as $ta)
                                    <option value="{{$ta->codTipoArticulo}}">{{$ta->descripcion}}</option> 
                                @endforeach
                            </select><br>
                            {{ Form::text('nombArticulo', Input::old('nombArticulo'), array('placeholder'=>'Nombre del Articulo','class' => 'form-control','required')) }}<br>
                             {{ Form::text('precio', Input::old('precio'), array('id'=>'precio', 'placeholder'=>'Precio','class' => 'form-control','required')) }}<br>

                            {{ Form::textarea('descripcion', Input::old('descripcion'), array('placeholder'=>'Descripción','rows'=>'3','maxlength'=>'50','class' => 'form-control','required')) }}
                            <br>

                            <select name="activo" id="activo" class="form-control" required>
                              <option value="1">Activado</option>
                              <option value="0">Desactivado</option>
                            </select>
                            <br>
                            {{ Form::submit('Agregar', array('class'=>'btn btn-success')) }}
                        </div>
                        <div class="col-xs-8">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">
                                    Seleccionar Imagenes del Articulo
                                    </h3>
                                </div>
                                <div class="box-body" style="max-height: 400px;overflow:scroll">
                                    <select name="imagenes[]" id="gat" class="image-picker masonry" multiple="multiple" required>
                                        @foreach($imagenes as $imagen)
                                          <option data-img-src="/TAP/tap/public/uploads/{{$imagen->imagen_archivo}}" value="{{$imagen->codImagen}}">{{$imagen->descripcion}}</option>
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
