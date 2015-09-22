@extends('layouts.adminLayout')

@section('styles')
<!-- DATA TABLES -->
          <!-- Bootstrap date picker -->
        <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet"/>
@stop

@section('content')

<div class="row">
    <div class="col-xs-10">
    	<div class="box">
			<div class="box-header">
				<h3 class="box-title">Editar Noticia</h3>
			</div>
			<div class="box-body">
	    		{{ Form::open(array('method' => 'PATCH', 'route'=>['noticia.update', $noticias->codNoticia], 'files' => true)) }}
					<input placeholder="Titulo" class="form-control" id="titulo" required="required" name="titulo" type="text" value="{{$noticias->titulo}}"> <br>
					<input placeholder="Fecha" class="form-control" id="fecha" required="required" name="fecha" type="text" value="{{$noticias->fecha}}"> <br>
                    
                    <textarea class="form-control"  name="breveDescripcion" maxlength="199" rows="2">{{$noticias->breveDescripcion}}</textarea><br>
					<textarea placeholder="Descripción" name="descripcion" id="descripcion">{{$noticias->descripcion}}</textarea> <br>
                    
                    Imagen de cabecera: <br>
                    @foreach ($imagen as $ima)
                        {{-- expr --}}
                    <img id="imgcabecera" src="{{$ima->imagen_archivo}}" alt="" class="img-thumbnail">
                    @endforeach
                    
					{{ Form::file('imagen',array('class'=>'fileinput')) }}
                	<br>
					{{ Form::submit('Editar', array('class'=>'btn btn-success')) }}
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
        <script src="{{ asset('js/plugins/input-maskjquery.inputmask.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
        <!-- date picker -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>

	$(function() {
    CKEDITOR.replace('descripcion');
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