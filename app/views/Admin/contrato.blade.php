@extends('layouts.adminLayout')

@section('styles')
    <!-- DATA TABLES -->
    <link href="{{ asset('css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap time Picker -->
    <link href="{{ asset('css/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/bootstrap-multiselect.css') }}" rel="stylesheet"/>
    <!-- Bootstrap date picker -->
        <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet"/>
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
                    <h3 class="box-title">Lista de Contratos</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Monto</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(isset($items))

							@foreach ($items as $contrato)
								<tr id="{{$contrato->codContrato}}" onclick="go(this)">
                                    <td>{{$contrato->fechaPresentacion}}</td>
                                    <td>{{$contrato->descripcion}}</td>
                                    <td>{{$contrato->monto}}</td>

									<td style="text-align:center"><a href="contrato/{{$contrato->codContrato}}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></a></td>

                                    <td style="text-align:center">
                                    	{{ Form::open(array('url' => 'contrato/' . $contrato->codContrato)) }}
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
            		Agregar Nuevo Contrato
            		</h3>
            	</div>
            	<div class="box-body">
            	{{ Form::open(array('url'=>'contrato', 'method' => 'POST')) }}
                         


                <label for="codCliente">Cliente:</label>           
                <select name="codCliente" id="codCliente" class="form-control">
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->codCliente}}">{{$cliente->razonSocial}}</option>
                    @endforeach
                </select><br>
                <label for="codEvento">Evento:</label>
                <select name="codEvento" id="codEvento" class="form-control">
                    <option value="">---------Selecciona un Evento---------</option>
                    @foreach ($itemss as $evento)
                        @if($evento->tipoevento_id == 1)
                            <option value="{{$evento->codEvento}}">{{$evento->nombEvento}}</option>
                        @endif
                    @endforeach
                </select><br>
                
                    <?php 
                        $canci=[];
                        foreach($canciones as $cancion){
                            $a = $cancion->codCancion;
                            $b = $cancion->nombCancion;
                            $canci[$a]=$b;
                        }
                        
                    ?>
                    <label for="">Selecciona las canciones:</label>
                {{ Form::select('codCancion[]', $canci,null, array('multiple'=>true,'class'=>'multiselect')) }}
               <br><br>
                <label for="fechaPresentacion">Fecha de la presentación:</label>
                {{ Form::text('fechaPresentacion', Input::old('fechaPresentacion'), array('placeholder'=>'Fecha de la Presentacion','class' => 'form-control','id'=>'fechaPresentacion','required', "maxlength"=>10)) }}<br>
                <label for="horaPresentacion">Hora de la presentación:</label>
                <div class="bootstrap-timepicker">
                    {{ Form::text('horaPresentacion', Input::old('horaPresentacion'), array('placeholder'=>'Hora de la Presentacion','class' => 'form-control timepicker','id'=>'horaPresentacion','required')) }}
                </div>
                <br>
                <label for="cantDias">Cantidad de Días:</label>
                <select name="cantDias" id="cantDias" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                </select>
                <br>
                <label for="cantDias">Cantidad de Horas:</label>
                <select name="cantidadHoras" id="cantidadHoras" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                </select>
                <br>
                <label for="monto">Monto:</label>
                {{ Form::text('monto', Input::old('monto'), array('placeholder'=>'Monto en Dolares Americanos ($)','class' => 'form-control','id'=>'monto','required')) }}<br>
                {{ Form::textarea('descripcion', Input::old('descripcion'), array('placeholder'=>'Descripción','rows'=>'3','maxlength'=>'300','class' => 'form-control')) }}
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

        <script src="{{ asset('js/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap-multiselect.js') }}" type="text/javascript"></script>
         <!-- date picker -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
function go(obj){
	window.location = "contrato/"+obj.id;
}
    $(function() {
        $(".timepicker").timepicker({
            showInputs: false,
            disableFocus: true,
            showMeridian: false
        });
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

                $("#fechaPresentacion").datepicker({
                format: 'mm/dd/yyyy',
                startDate: '-3d'
            })
        $('.multiselect').multiselect({
            buttonWidth: '100%',
            includeSelectAllOption: true,
            enableFiltering: true
        })
    });
</script>
@stop
