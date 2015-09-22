@extends('layouts.adminLayout')

@section('styles')
<!-- Bootstrap date Picker -->
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet"/>
@stop

@section('content')

<div class="row">
    <div class="col-xs-6">
    	<div class="box">
			<div class="box-header">
				<h3 class="box-title">Editar Video</h3>
			</div>
			<div class="box-body">
	    		{{ Form::open(array('method' => 'PATCH', 'route'=>['video.update', $videos->codVideo])) }}
	    			<input type="text" name="nombVideo" class="form-control" value="{{$videos->nombVideo}}"><br>
	    			<input type="text" name="link" class="form-control" value="{{$videos->link}}"><br>
					<input type="text" name="fecha" id="fecha" class="form-control" value="{{$videos->fecha}}"><br>
	    			<textarea name="descripcion" id="" rows="3" class="form-control" maxlength="50">{{$videos->descripcion}}</textarea><br>
					{{ Form::submit('Editar', array('class'=>'btn btn-success')) }}
				{{ Form::close() }}
			</div>
    	</div>
    </div>


    <div class="col-xs-6">
    	<iframe width="420" height="345"
			src="http://www.youtube.com/embed/{{$videos->link}}">
		</iframe>
    </div>
    	
</div>
@stop
@section('scripts')
<!-- DATE PICKER -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
	$(document).ready(function() {
	    $("#fecha").datepicker({
	        format: 'mm/dd/yyyy',
	        startDate: '-3d'
	    })
	});
</script>
@stop
