@extends('layouts.adminLayout')

@section('styles')
    <!-- DATA TABLES -->
    <link href="{{ asset('css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap time Picker -->
    <link href="{{ asset('css/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"/>
    <!-- Image Picker -->
      <link href="{{ asset('css/image-picker.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('css/jPages.css') }}" rel="stylesheet" type="text/css" />
          <!-- Bootstrap date picker -->
        <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet"/>
    <style>
    tr{
    	cursor: pointer;	
    }
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
                    <h3 class="box-title">Lista de Galerías</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(isset($galerias))

							@foreach ($galerias as $galeria)
								<tr id="{{$galeria->codGaleria}}" onclick="go(this)">
                                    <td>{{$galeria->nombGaleria}}</td>
                                    <td>{{$galeria->fecha}}</td>
                                    <td>{{$galeria->descripcion}}</td>

									<td style="text-align:center"><a href="galeria/{{$galeria->codGaleria}}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></a></td>
                                    
                                    <td style="text-align:center">
                                    	{{ Form::open(array('url' => 'galeria/' . $galeria->codGaleria)) }}
											{{ Form::hidden('_method', 'DELETE') }}
                                    		<button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
										{{ Form::close() }}
                                    </td>
                                </tr>
							@endforeach						
							@endif
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-xs-5">
            <div class="box">
            	<div class="box-header">
            		<h3 class="box-title">
            		Agregar Nueva Galería
            		</h3>
            	</div>
            	<div class="box-body">
            	{{ Form::open(array('url'=>'galeria', 'method' => 'POST')) }}

            	{{ Form::text('nombGaleria', Input::old('nombGaleria'), array('placeholder'=>'Nombre','class' => 'form-control','id'=>'nombGaleria','required')) }}<br>

                {{ Form::text('fecha', Input::old('fecha'), array('placeholder'=>'Fecha','class' => 'form-control','id'=>'fecha','required')) }}<br>
                Breve descripción:
                <textarea name="descripcion" id="descripcion" rows="2" maxlength="250" class="form-control"></textarea>
				<br>

				{{ Form::submit('Agregar', array('class'=>'btn btn-success')) }}

				</div>
            </div>
        </div>
        <div class="col-xs-7">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                    Seleccionar Imagenes
                    </h3>
                </div>
                <div class="box-body" style="max-height: 400px;overflow:scroll">
                    <select name="imagenes[]" id="gat" class="image-picker masonry" multiple="multiple" required>
                        @foreach($imagenes as $imagen)
                          <option data-img-src="/TAP/tap/public/uploads/{{$imagen->imagen_archivo}}" value="{{$imagen->codImagen}}">{{$imagen->descripcion}}</option>
                        @endforeach

                {{ Form::close() }}
                    </select>
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
        <script src="{{ asset('js/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
           <!-- Image picker -->
        <script src="{{ asset('js/image-picker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/masonry.pkgd.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jPages.min.js') }}" type="text/javascript"></script>
        <!-- date picker -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
function go(obj){
	window.location = "galeria/"+obj.id;
}
	$(function() {
    $('form').on('submit', function(){
        return confirm('¿Está seguro de esta acción?');
    });
        $("#gat").imagepicker();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
        
	    $("#fecha").datepicker({
                format: 'mm/dd/yyyy',
                startDate: '-3d'
            })
    });
    
</script>
@stop
