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
                    <h3 class="box-title">Lista de Noticias</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(isset($items))

							@foreach ($items as $noticia)
								<tr id="{{$noticia->codNoticia}}" onclick="go(this)">
                                    <td>{{$noticia->fecha}}</td>
                                    <td>{{$noticia->titulo}}</td>
                                    <td>{{$noticia->breveDescripcion}}</td>

									<td style="text-align:center"><a href="noticia/{{$noticia->codNoticia}}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></a></td>
                                    
                                    <td style="text-align:center">
                                    	{{ Form::open(array('url' => 'noticia/' . $noticia->codNoticia)) }}
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
            		Agregar Nuevo Noticia
            		</h3>
            	</div>
            	<div class="box-body">
            	{{ Form::open(array('url'=>'noticia', 'method' => 'POST', 'files' => true)) }}

            	{{ Form::text('titulo', Input::old('titulo'), array('placeholder'=>'Titulo','class' => 'form-control','id'=>'titulo','required')) }}<br>

                {{ Form::text('fecha', Input::old('fecha'), array('placeholder'=>'Fecha','class' => 'form-control','id'=>'fecha','required')) }}<br>
                Breve descripción:
                <textarea name="breveDescripcion" id="breveDescripcion" rows="2" maxlength="199" class="form-control"></textarea>

                <br>
                <textarea name="descripcion" id="descripcion" rows="10" cols="80"></textarea>
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
                    <select name="imagenes[]" id="gat" class="image-picker masonry" multiple="multiple" required data-limit='1'>
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
        <script src="{{ asset('js/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/input-maskjquery.inputmask.extensions.js') }}" type="text/javascript"></script>
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
	window.location = "http://localhost:8080/TAP/tap/public/noticia/"+obj.id;
}
	$(function() {
          CKEDITOR.replace('descripcion');

            $("#gat").imagepicker();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
    $('form').on('submit', function(){
        return confirm('¿Está seguro de esta acción?');
    });
    $("#fecha").datepicker({
                format: 'mm/dd/yyyy',
                startDate: '-3d'
            })

    });
    
</script>
@stop