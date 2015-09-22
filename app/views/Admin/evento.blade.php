@extends('layouts.adminLayout')

@section('styles')
    <!-- DATA TABLES -->
    <link href="{{ asset('css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap time Picker -->
    <link href="{{ asset('css/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"/>
    <!-- Bootstrap date Picker -->
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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Eventos</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Activo</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(isset($items))

							@foreach ($items as $evento)
								<tr >
                                    <td style="text-align: center">
                                    @if($evento->activo==1)
                                    <button type="button" data-loading-text="Espere.." data-cod="{{$evento->codEvento}}" data-act="{{$evento->activo}}" class="actv btn btn-success " autocomplete="off"> On
                                    </button>
                                    @else
                                    <button type="button" data-loading-text="Espere.." data-cod="{{$evento->codEvento}}" data-act="{{$evento->activo}}" class="actv btn btn-danger" autocomplete="off"> Off
                                    </button>
                                    @endif</td>
                                    <td id="{{$evento->codEvento}}" onclick="go(this)">{{$evento->nombEvento}}</td>
                                    <td>{{$evento->descripcion}}</td>
                                    <td>{{$evento->fechaEvento}}</td>
                                    <td>{{$evento->horaEvento}}</td>
                                    <td style="text-align:center">
                                        @if($evento->tipoevento_id == 1)
                                        <a href="contrato" class="btn btn-success"><i class="fa fa-plus"></i> Contrato</a>
                                        @endif
                                    </td>
									<td style="text-align:center"><a href="evento/{{$evento->codEvento}}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></a></td>
                                    <td style="text-align:center">
                                    	{{ Form::open(array('url' => 'evento/' . $evento->codEvento)) }}
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
                    Agregar Nuevo Evento
                    </h3>
                </div>
                <div class="box-body">
                {{ Form::open(array('url'=>'evento', 'method' => 'POST')) }}
                
                {{ Form::text('nombEvento', Input::old('nombEvento'), array('placeholder'=>'Nombre del Evento','class' => 'form-control','id'=>'nombEvento','required')) }}<br>

                {{ Form::text('fechaEvento', Input::old('fechaEvento'), array('placeholder'=>'Fecha Evento','class' => 'form-control','id'=>'fechaEvento','required','maxlength'=>10)) }}<br>

                <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group">
                {{ Form::text('horaEvento', Input::old('horaEvento'), array('placeholder'=>'Hora','class' => 'form-control timepicker','id'=>'horaEvento','required')) }}<br>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                <select name="codEstablecimiento" id="codEstablecimiento" class="form-control">
                    <option >Establecimiento</option>
                    @foreach($items2 as $item)
                        <option value="{{$item->codEstablecimiento}}" >{{$item->nombEstablecimiento}}</option>
                    @endforeach
                </select><br>
                <select name="idTipoEvento" id="idTipoEvento" class="form-control">
                    <option >Tipo de Evento</option>
                    @foreach($tipoevento as $item)
                        <option value="{{$item->idTipoEvento}}" >{{$item->nombre}}</option>
                    @endforeach
                </select><br>
                 <select name="activo" id="activo" class="form-control">
                  <option value="1">Activado</option>
                  <option value="0">Desactivado</option>
                </select>
                <br>
                {{ Form::textarea('descripcion', Input::old('descripcion'), array('placeholder'=>'Descripción','rows'=>'3','maxlength'=>'50','class' => 'form-control')) }}
                <br>
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
        <script src="{{ asset('js/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <!-- DATE PICKER -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
    
function go(obj){
	window.location = "evento/"+obj.id;
}
function activar(i,a){
  $.post('activarevento', {id:i,activo:a}, function(data, textStatus, xhr) {
  });
}
    $(function() {
     $("#fechaEvento").datepicker({
        format: 'dd/mm/yyyy',
        starDate: '-3d'
    });


      $('.actv').on('click', function () {
        var $btn = $(this).button('loading');
        setTimeout(function(){
          $btn.button('reset');
          if($btn.data('act') == 1){
              activar($btn.data('cod'),0);
              $btn.removeClass('btn-success');
              $btn.addClass('btn-danger');
              $btn.text('Off');
          }else{
              activar($btn.data('cod'),1);
              $btn.removeClass('btn-danger');
              $btn.addClass('btn-success');
              $btn.text('On');
          }
        }
        ,2000);
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
    // $("#fechaEvento").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
         $("#horaEvento").timepicker({
                    showInputs: false,
                    disableFocus: true,
                    showMeridian: false,
                });


    });




</script>
@stop
