@extends('layouts.adminLayout')

@section('styles')
    <!-- Bootstrap time Picker -->
    <link href="{{ asset('css/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"/>
<!-- DATA TABLES -->
<link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet"/>
@stop

@section('content')

<div class="row">
    <div class="col-xs-6">
    	<div class="box">
			<div class="box-header">
				<h3 class="box-title">Editar Evento</h3>
			</div>
			<div class="box-body">
	    		{{ Form::open(array('method' => 'PATCH', 'route'=>['evento.update', $eventos->codEvento])) }}
					
					<input type="text" name="nombEvento" class="form-control" value="{{$eventos->nombEvento}}" id="fechaEvento"><br>
	    			<input type="text" name="fechaEvento" class="form-control datepicker" value="{{$eventos->fechaEvento}}" id="fechaEvento"><br>
	    			    <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <div class="input-group">
				    			<input type="text" name="horaEvento" class="form-control" value="{{$eventos->horaEvento}}" id="horaEvento" required placeholder="Hora">
								<br>
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </div>
					
					 <select name="codEstablecimiento" id="codEstablecimiento" class="form-control">
	                    @foreach($items2 as $item)
	                     	@if ($item->codEstablecimiento == $eventos->codEstablecimiento) 
		                        <option value="{{$item->codEstablecimiento}}" selected >{{$item->nombEstablecimiento}}</option>
	                     	@else 
	                     		<option value="{{$item->codEstablecimiento}}" >{{$item->nombEstablecimiento}}</option>
	                     	@endif
	                    @endforeach
	                </select><br>
    			    <select name="idTipoEvento" id="idTipoEvento" class="form-control">
	                    @foreach($tipoevento as $item)
	                    	@if($item->idTipoEvento == $eventos->tipoevento_id )
	                        	<option value="{{$item->idTipoEvento}}" selected>{{$item->nombre}}</option>
	                    	@else
	                    		<option value="{{$item->idTipoEvento}}">{{$item->nombre}}</option>
	                    	@endif
	                    @endforeach
                	</select><br>
                	<select name="activo" id="activo" class="form-control">
                        @if($eventos->activo == 1)
                            <option value="1" selected>Activado</option>
                            <option value="0">Desactivado</option>
                        @else
                            <option value="1">Activado</option>
                            <option value="0" selected>Desactivado</option>
                        @endif
                    </select><br>
	    			<textarea name="descripcion" id="" rows="3" class="form-control" maxlength="50">{{$eventos->descripcion}}</textarea><br>
					{{ Form::submit('Editar', array('class'=>'btn btn-success')) }}
				{{ Form::close() }}
			</div>
    	</div>
    </div>
</div>
@stop
@section('scripts')
<script src="{{ asset('js/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<!-- DATE PICKER -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function() {
	$('.datepicker').datepicker({
	    format: 'mm/dd/yyyy',
	    startDate: '-3d'
	});
	    $("#horaEvento").timepicker({
                    showInputs: false,
                    disableFocus: true,
                    showMeridian: false,
                });
});
</script>
@stop