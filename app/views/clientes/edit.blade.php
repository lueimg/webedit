@extends('layouts.adminLayout')

@section('styles')
    <!-- DATA TABLES -->
    <link href="{{ asset('css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap time Picker -->
    <link href="{{ asset('css/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/bootstrap-multiselect.css') }}" rel="stylesheet"/>
    <style>
    tr{
    	cursor: pointer;	
    }
    </style>
@stop

@section('content')
	<div class="row">
        <div class="col-xs-6">
            <div class="box">
            	<div class="box-header">
            		<h3 class="box-title">
            		Editar Cliente
            		</h3>
            	</div>
            	<div class="box-body">
                {{ Form::open(array('method' => 'PATCH', 'route'=>['cliente.update', $cliente->codCliente])) }}
                Razón Social
                {{ Form::text('razonSocial', $cliente->razonSocial ,array('placeholder'=>'Razón social','class' => 'form-control','id'=>'razonSocial','required')) }}<br>

                Ruc
                {{ Form::text('ruc',$cliente->ruc, array('placeholder'=>'Ruc','class' => 'form-control','id'=>'ruc','required','maxlength'=>11)) }}<br>

                Representante
                {{ Form::text('representante',$cliente->representante, array('placeholder'=>'Nombre del representante','class' => 'form-control','id'=>'representante','required')) }}<br>

                Dni
                {{ Form::text('dniRepresentante', $cliente->dniRepresentante, array('placeholder'=>'Dni','class' => 'form-control','id'=>'dniRepresentante','required','maxlength'=>8)) }}<br>
                
                Dirección
                {{ Form::text('direccion',$cliente->direccion, array('placeholder'=>'Dirección','class' => 'form-control','id'=>'direccion','required')) }}<br>

                Teléfono
                {{ Form::text('telefono',$cliente->telefono, array('placeholder'=>'Telefono','class' => 'form-control','id'=>'telefono','required')) }}<br>
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
        <script src="{{ asset('js/bootstrap-multiselect.js') }}" type="text/javascript"></script>
<script>
function go(obj){
	window.location = "contrato/"+obj.id;
}
	$(function() {
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
</script>
@stop
