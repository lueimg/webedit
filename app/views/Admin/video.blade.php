@extends('layouts.adminLayout')

@section('styles')
<!-- DATA TABLES -->
        <link href="{{ asset('css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Videos</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(isset($items))

							@foreach ($items as $video)
								<tr id="{{$video->codVideo}}" onclick="go(this)">
                                    <td>{{$video->fecha}}</td>
                                    <td>{{$video->nombVideo}}</td>
                                    <td>{{$video->descripcion}}</td>
									<td style="text-align:center"><a href="video/{{$video->codVideo}}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></a></td>
                                    <td style="text-align:center">
                                    	{{ Form::open(array('url' => 'video/' . $video->codVideo)) }}
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
            		Agregar Nuevo Video
            		</h3>
            	</div>
            	<div class="box-body">
            	{{ Form::open(array('url'=>'video', 'method' => 'POST')) }}
            	{{ Form::text('nombVideo', Input::old('nombVideo'), array('placeholder'=>'Nombre del Video','class' => 'form-control','required')) }}<br>
                {{ Form::text('fecha', Input::old('fecha'), array('placeholder'=>'Fecha del Video','class' => 'form-control','required','id'=>'fecha')) }}<br>

				{{ Form::text('link', Input::old('link'), array('placeholder'=>'Link','class' => 'form-control','required')) }}<br>
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
        <!-- BOOTSTRAP DATE PICKER -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
function go(obj){
	window.location = "video/"+obj.id;
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
        $("#fecha").datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        })
    });
    $('form').on('submit', function(){
	    return confirm('¿Está seguro de esta acción?');
	});

</script>
@stop
