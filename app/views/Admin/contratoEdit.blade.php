@extends('layouts.adminLayout')

@section('styles')
    <link href="{{ asset('css/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/bootstrap-multiselect.css') }}" rel="stylesheet"/>
@stop

@section('content')

<div class="row">
    <div class="col-xs-6">
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
				<h3 class="box-title">Editar Contrato</h3>
			</div>
			<div class="box-body">
	    		{{ Form::open(array('method' => 'PATCH', 'route'=>['contrato.update', $contratos->codContrato])) }}
					<select name="codCliente" id="codCliente" class="form-control">
	                    @foreach ($clientes as $cliente)

	                    	@if($contratos->codCliente == $cliente->codCliente)

	                        	<option value="{{$cliente->codCliente}}" selected>{{$cliente->razonSocial}}</option>
	                        @else
	                        <option value="{{$cliente->codCliente}}">{{$cliente->razonSocial}}</option>
	                        

	                        @endif
	                    @endforeach
	                </select><br>
					<select name="codEvento" id="codEvento" class="form-control">
	                    @foreach ($itemss as $evento)
	                    	@if($contratos->codEvento == $evento->codEvento)
	                        	<option value="{{$evento->codEvento}}" selected>{{$evento->nombEvento}}</option>
	                        @else
								<option value="{{$evento->codEvento}}">{{$evento->nombEvento}}</option>
	                        @endif
	                    @endforeach
                	</select><br>

                	<?php 
                        $canci=[];$cancix=[];
                        foreach($canciones as $cancion){
                            $a = $cancion->codCancion;
                            $b = $cancion->nombCancion;
                            $canci[$a]=$b;
                        }
                        foreach($cancionesx as $cancion){
                            $a = $cancion->codCancion;
                            array_push($cancix,$a);
                        }
                    ?>
	                {{ Form::select('codCancion[]', $canci, $cancix, array('multiple'=>true,'class'=>'multiselect')) }}
	               	<br><br>

	    			<input type="text" name="fechaPresentacion" class="form-control" value="{{$contratos->fechaPresentacion}}" id="fechaPresentacion"><br>
 <div class="bootstrap-timepicker">
	    			<input type="text" name="horaPresentacion" class="form-control" value="{{$contratos->horaPresentacion}}" id="horaPresentacion">
                    </div>
                    <br>        
	    			

	    			<input type="text" name="cantDias" class="form-control" value="{{$contratos->cantDias}}" id="cantDias"><br>			
	    			<input type="text" name="cantidadHoras" class="form-control" value="{{$contratos->cantidadHoras}}" id="cantidadHoras"><br>
	    			
					
	    			<input type="text" name="monto" class="form-control" value="{{$contratos->monto}}" id="monto"><br>

	    			<textarea name="descripcion" id="" rows="3" class="form-control" maxlength="50" style="text-align:left;">{{$contratos->descripcion}}</textarea>
					<br>
					{{ Form::submit('Editar', array('class'=>'btn btn-success')) }}
				{{ Form::close() }}
			</div>
    	</div>
    </div>
</div>
@stop
@section("scripts")
         <!-- InputMask -->
        <script src="{{ asset('js/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/input-maskjquery.inputmask.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap-multiselect.js') }}" type="text/javascript"></script>
<script>
function go(obj){
	window.location = "http://localhost:8080/TAP/tap/public/contrato/"+obj.id;
}
	$(function() {
        $('form').on('submit', function(){
            return confirm('¿Está seguro de esta acción?');
        });
        $("#fechaPresentacion").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
    });
     $("#horaPresentacion").timepicker({
            showInputs: false,
            disableFocus: true,
            showMeridian: false
        });

    $('.multiselect').multiselect({
        buttonWidth: '100%',
        includeSelectAllOption: true,
        enableFiltering: true
    })
</script>
@stop