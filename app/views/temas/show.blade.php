@extends('layouts.webLayout')
@section('styles')
 <!-- DATA TABLES -->
    <link href="{{ asset('css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<style>
.pagination>.disabled>span, .pagination>.disabled>span:hover, .pagination>.disabled>span:focus, .pagination>.disabled>a, .pagination>.disabled>a:hover, .pagination>.disabled>a:focus,.table-hover>tbody>tr:hover>td, .table-hover>tbody>tr:hover>th,.thumbnail{
    background: transparent;
    border: none;
}

.table-hover>tbody>tr:hover>td, .table-hover>tbody>tr:hover>th,.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
    border: none;
    border-bottom: 1px solid rgba(110,110,110,.8);
}
.table{
    border: none !important;
    color: rgb(140,140,140);
}
.dataTables_filter label{
    
}
</style>      
@show

@section('content')
      <!-- Example row of columns -->
      <div class="row">
          <!-- Temas -->
          <div class="col-sm-12 pad-fix">
            <div class="dark-container">
              <div class="wrapper">
                  
                  <br>
                  <div class="row" style="border-bottom: 1px solid #959887">
	                  <div class="col-sm-3" style="text-align: center;">
		                  <div class="thumbnail">
		                  	  @if ($tema->User->Imagen)
		                  	  	<img style="max-width: 200px;"src="http://localhost:8080/TAP/tap/public/uploads/{{$tema->User->Imagen->imagen_archivo}}" alt="...">
		                  	  @else
						      <img style="max-width: 200px;"src="http://localhost:8080/TAP/tap/public/images/buddy.png" alt="...">
		                  	  @endif
						      <div class="caption" style="color:#B7B9AC">
						        <h4>{{$tema->User->username}}</h4>
						        <dl>
						        	<dt>Fecha de Ingreso:</dt> <dd>{{$tema->User->created_at}}</dd>
						        </dl>
						      </div>
						  </div>
	                  </div>
	                  <div class="col-sm-9">
	                  	<div class="titulo">
		                    {{$tema->titulo}}
		                </div>
		                <div>
		                	
		                	{{$tema->descripcion}}
		                </div>
	                  </div>
                  </div>
                  @foreach ($tema->replies as $reply)
                  	<div class="row" style="border-bottom: 1px solid #959887">
	                  <div class="col-sm-3" style="text-align: center;">
		                  <div class="thumbnail">
		                  	<br>

						      @if ($reply->User->Imagen)
		                  	  	<img style="max-width: 200px;"src="http://localhost:8080/TAP/tap/public/uploads/{{$reply->User->Imagen->imagen_archivo}}" alt="...">
		                  	  @else
						      <img style="max-width: 200px;"src="http://localhost:8080/TAP/tap/public/images/buddy.png" alt="...">
		                  	  @endif

						      <div class="caption" style="color:#B7B9AC">
						        <h4>{{$reply->User->username}}</h4>
						        <dl>
						        	<dt>Fecha de Ingreso:</dt> <dd>{{$reply->User->created_at}}</dd>
						        </dl>
						      </div>
						  </div>
	                  </div>
	                  <div class="col-sm-9">
		                <div>
		                	<br>
		                	{{$reply->descripcion}}
		                </div>
	                  </div>
                  </div>
                  @endforeach
              
              </div>
            </div>
          </div><!-- ./Temas -->
      </div>
      <br>
      <div class="row">
      	<div class="col-sm-12 pad-fix">
            <div class="dark-container">
              <div class="wrapper">
                  <div class="titulo">
                    Responder:
                  </div>
                  <br>
                   @if(Session::has('usuario'))
	                <form action="http://localhost:8080/TAP/tap/public/reply" method="post">
	                	<input type="hidden" value="{{$tema->codTema}}" name="codTema">
					   	<textarea name="descripcion" id="descripcion" rows="10" cols="80"></textarea>
					   	<br>
					   	<button class="btn btn-primary btn-lg">Enviar</button>
				   	</form>
                  @else
                    <div class="alert alert-primary">
                    	Debes de estar registrado para poder comentar
                    	<a href="#" data-toggle="modal" data-target="#loginModal">¡REGISTRARSE AHORA!</a>
	                </div>
                  @endif
              </div>
            </div>
          </div>
      </div>
 
@stop
@section('scripts')
  <!-- DATA TABES SCRIPT -->
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
          <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
        <script>
           CKEDITOR.replace('descripcion');
           $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": false
        });
           // $('.dataTables_filter label').html('Buscar:');
        </script>
@stop