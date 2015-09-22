@extends('layouts.adminLayout')

@section('styles')
<!-- DATA TABLES -->
        <link href="{{ asset('css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
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
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Perfil</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(isset($users))

							@foreach ($users as $user)
								<tr id="{{$user->id}}" onclick="go(this)">
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->nombre}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->codPerfil}}</td>

									<td style="text-align:center"><a href="usuario/{{$user->id}}/edit" class="btn btn-info">
                                        <i class="fa fa-pencil"></i></a>
                                    </td>
                                    <td style="text-align:center">
                                    	{{ Form::open(array('url' => 'user/' . $user->id)) }}
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
            		Agregar Nuevo Usuario
            		</h3>
            	</div>
            	<div class="box-body">
                
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
<script>
function go(obj){
	window.location = "http://localhost:8080/TAP/tap/public/video/"+obj.id;
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
    });
    $('form').on('submit', function(){
	    return confirm('¿Está seguro de esta acción?');
	});
    $("#fecha").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});

</script>
@stop