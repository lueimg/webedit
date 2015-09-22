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
                    <h3 class="box-title">Lista de Clientes</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>Ruc</td>
                                <td>Razon Social</td>
                                <td>Dirección</td>
                                <td>Representante</td>
                                <td>Dni representante</td>
                                <td>Telefono</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(isset($clientes))

							@foreach ($clientes as $cliente)
								<tr id="{{$cliente->codCliente}}" onclick="go(this)">
                                    <td>{{$cliente->ruc}}</td>
                                    <td>{{$cliente->razonSocial}}</td>
                                    <td>{{$cliente->direccion}}</td>
                                    <td>{{$cliente->representante}}</td>
                                    <td>{{$cliente->dniRepresentante}}</td>
                                    <td>{{$cliente->telefono}}</td>

									<td style="text-align:center"><a href="cliente/{{$cliente->codCliente}}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></a></td>

                                    <td style="text-align:center">
                                    	{{ Form::open(array('url' => 'cliente/' . $cliente->codCliente)) }}
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
        <div class="col-xs-6">
            <div class="box">
            	<div class="box-header">
            		<h3 class="box-title">
            		Agregar Nuevo Cliente
            		</h3>
            	</div>
            	<div class="box-body">
            	{{ Form::open(array('url'=>'cliente', 'method' => 'POST')) }}
                                    
                {{ Form::text('razonSocial', Input::old('razonSocial'), array('placeholder'=>'Razón social','class' => 'form-control','id'=>'razonSocial','required')) }}<br>

                {{ Form::text('representante', Input::old('representante'), array('placeholder'=>'Nombre del representante','class' => 'form-control','id'=>'representante','required')) }}<br>


                {{ Form::text('dniRepresentante', Input::old('dniRepresentante'), array('placeholder'=>'Dni','class' => 'form-control','id'=>'dniRepresentante','required','maxlength'=>8)) }}<br>



                {{ Form::text('direccion', Input::old('direccion'), array('placeholder'=>'Dirección','class' => 'form-control','id'=>'direccion','required')) }}<br>


                {{ Form::text('ruc', Input::old('ruc'), array('placeholder'=>'Ruc','class' => 'form-control','id'=>'ruc','required','maxlength'=>11)) }}<br>

                {{ Form::text('telefono', Input::old('telefono'), array('placeholder'=>'Telefono','class' => 'form-control','id'=>'telefono','required')) }}<br>
				<br>
				{{ Form::submit('Agregar', array('class'=>'btn btn-success')) }}

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
<script>
function go(obj){
	window.location = "cliente/"+obj.id;
}
	$(function() {
        $("#telefono").inputmask("999999999", {"placeholder": ""});
        $("#ruc").inputmask("99999999999", {"placeholder": ""});
        $("#dniRepresentante").inputmask("99999999", {"placeholder": ""});
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
    });

</script>
@stop
