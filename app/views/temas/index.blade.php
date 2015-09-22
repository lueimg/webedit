@extends('layouts.webLayout')
@section('styles')
 <!-- DATA TABLES -->
    <link href="{{ asset('css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<style>
.pagination>.disabled>span, .pagination>.disabled>span:hover, .pagination>.disabled>span:focus, .pagination>.disabled>a, .pagination>.disabled>a:hover, .pagination>.disabled>a:focus,.table-hover>tbody>tr:hover>td, .table-hover>tbody>tr:hover>th{
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
                  <div class="titulo">
                    Foro
                  </div>
                  <br>
                  @if (Session::has('usuario'))
                    <a href="foro/tema" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-plus"></i> Nuevo Tema</a>
                  @endif
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="min-width: 400px">Título</th>
                                <th>Respuestas</th>
                                <th>Fecha de Publicación</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($temas as $tema)
                            @if ($tema->titulo)
                                {{-- expr --}}
                            <tr>
                                <td style="min-width: 400px"> 
                                    <a href="http://localhost:8080/TAP/tap/public/foro/{{$tema->codTema}}">{{$tema->titulo}}</a>
                                    <br>
                                    {{$tema->User->username}}
                                </td>
                                <td style="text-align: center"><i class="glyphicon glyphicon-comment"></i> {{count($tema->replies)}}</td>
                                <td>{{$tema->created_at}}</td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                   
              
              </div>
            </div>
          </div><!-- ./Temas -->
      </div>
 
@stop
@section('scripts')
  <!-- DATA TABES SCRIPT -->
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
        <script>
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