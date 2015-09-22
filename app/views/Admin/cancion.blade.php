@extends('layouts.adminLayout')

@section('styles')
<!-- DATA TABLES -->
        <link href="{{ asset('css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('js/soundmanager2-nodebug-jsmin.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bar-ui.js') }}" type="text/javascript"></script>
        <link href="{{ asset('css/soundmanager/bar-ui.css') }}" rel="stylesheet" type="text/css" />
        <!-- Bootstrap date picker -->
        <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet"/>
        <style>
        tr{
        	cursor: pointer;	
        }
  .sm2-bar-ui .sm2-main-controls,
.sm2-bar-ui .sm2-playlist-drawer {
 background-color: #324338;
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
                    <h3 class="box-title">Lista de Canciones</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr><th>Activo</th>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(isset($items))
              							@foreach ($items as $cancion)
              								<tr>
                                  <td style="text-align: center">
                                    @if($cancion->activo==1)
                                    <button type="button" data-loading-text="Espere.." data-cod="{{$cancion->codCancion}}" data-act="{{$cancion->activo}}" class="actv btn btn-success " autocomplete="off"> On
                                    </button>
                                    @else
                                    <button type="button" data-loading-text="Espere.." data-cod="{{$cancion->codCancion}}" data-act="{{$cancion->activo}}" class="actv btn btn-danger" autocomplete="off"> Off
                                    </button>
                                    @endif
                                  </td>
                                  <td>{{$cancion->fecha}}</td>
                                  <td>
                                    {{$cancion->nombCancion}}
                                  </td>
                                  <td>{{$cancion->descripcion}}</td>
									                <td style="text-align:center">
                                    <a href="cancion/{{$cancion->codCancion}}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                  </td>
                                  <td style="text-align:center">
                                    	{{ Form::open(array('url' => 'cancion/' . $cancion->codCancion)) }}
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
            </div><!-- /.box-->
        </div>
        <div class="col-xs-6">
            <div class="box">
            	<div class="box-header">
            		<h3 class="box-title">
            		Agregar Nueva Canción
            		</h3>
            	</div>
            	<div class="box-body">
              	{{ Form::open(array('url'=>'cancion', 'method' => 'POST', 'files' => true)) }}
              	{{ Form::text('nombCancion', Input::old('nombCancion'), array('placeholder'=>'Nombre de la Cancion','class' => 'form-control','required')) }}<br>

                <select name="activo" id="activo" class="form-control">
                  <option value="1">Activado</option>
                  <option value="0">Desactivado</option>
                </select>
                <br>
                      
        				{{ Form::text('fecha', Input::old('fecha'), array('placeholder'=>'Fecha','class' => 'form-control','id' => 'fecha','required')) }}<br> 

                        {{ Form::file('file',array('class'=>'fileinput')) }} <br>

        				{{ Form::textarea('descripcion', Input::old('descripcion'), array('placeholder'=>'Descripción','rows'=>'3','maxlength'=>'50','class' => 'form-control')) }}
        				<br>
        				{{ Form::submit('Agregar', array('class'=>'btn btn-success')) }}

        				{{ Form::close() }}
      				</div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Playlist
                    </h3>
                </div>
                <div class="box-body">
                  <div class="sm2-bar-ui flat full-width playlist-open">
                   <div class="bd sm2-main-controls">

                    <div class="sm2-inline-texture"></div>
                    <div class="sm2-inline-gradient"></div>

                    <div class="sm2-inline-element sm2-button-element">
                     <div class="sm2-button-bd">
                      <a href="#play" class="sm2-inline-button play-pause">Play / pause</a>
                     </div>
                    </div>

                    <div class="sm2-inline-element sm2-inline-status">

                     <div class="sm2-playlist">
                      <div class="sm2-playlist-target">
                       <!-- playlist <ul> + <li> markup will be injected here -->
                       <!-- if you want default / non-JS content, you can put that here. -->
                       <noscript><p>JavaScript is required.</p></noscript>
                      </div>
                     </div>

                     <div class="sm2-progress">
                      <div class="sm2-row">
                      <div class="sm2-inline-time">0:00</div>
                       <div class="sm2-progress-bd">
                        <div class="sm2-progress-track">
                         <div class="sm2-progress-bar"></div>
                         <div class="sm2-progress-ball"><div class="icon-overlay"></div></div>
                        </div>
                       </div>
                       <div class="sm2-inline-duration">0:00</div>
                      </div>
                     </div>

                    </div>

                    <div class="sm2-inline-element sm2-button-element sm2-volume">
                     <div class="sm2-button-bd">
                      <span class="sm2-inline-button sm2-volume-control volume-shade"></span>
                      <a href="#volume" class="sm2-inline-button sm2-volume-control">volume</a>
                     </div>
                    </div>

                    <div class="sm2-inline-element sm2-button-element">
                     <div class="sm2-button-bd">
                      <a href="#prev" title="Previous" class="sm2-inline-button previous">&lt; previous</a>
                     </div>
                    </div>

                    <div class="sm2-inline-element sm2-button-element">
                     <div class="sm2-button-bd">
                      <a href="#next" title="Next" class="sm2-inline-button next">&gt; next</a>
                     </div>
                    </div>

                    <div class="sm2-inline-element sm2-button-element sm2-menu">
                     <div class="sm2-button-bd">
                       <a href="#menu" class="sm2-inline-button menu">menu</a>
                     </div>
                    </div>

                   </div>

                   <div class="bd sm2-playlist-drawer sm2-element" style="height:auto;">

                    <div class="sm2-inline-texture">
                     <div class="sm2-box-shadow"></div>
                    </div>

                    <!-- playlist content is mirrored here -->

                    <div class="sm2-playlist-wrapper">
                      <ul class="sm2-playlist-bd">
                      
                          @foreach ($items as $cancion)
                              @if($cancion->activo == 1)
                                <li><a href="{{$cancion->cancion_archivo}}"><b>{{$cancion->nombCancion}}</b> - Autor</a></li>
                              @endif
                          @endforeach

                       

                      </ul>
                    </div>

                    <div class="sm2-extra-controls">

                     <div class="bd">

                      <div class="sm2-inline-element sm2-button-element">
                       <a href="#prev" title="Previous" class="sm2-inline-button previous">&lt; previous</a>
                      </div>

                      <div class="sm2-inline-element sm2-button-element">
                       <a href="#next" title="Next" class="sm2-inline-button next">&gt; next</a>
                      </div>

                      <!-- unimplemented -->
                      <!--
                      <div class="sm2-inline-element sm2-button-element disabled">
                       <a href="#repeat" title="Repeat playlist" class="sm2-inline-button repeat">&infin; repeat</a>
                      </div>

                      <div class="sm2-inline-element sm2-button-element disabled">
                       <a href="#shuffle" title="Shuffle" class="sm2-inline-button shuffle">shuffle</a>
                      </div>
                      -->

                     </div>

                    </div>

                   </div>

                  </div>
                </div><!--BOX-BODY-->
            </div><!--BOX-->
        </div><!--col-->
    </div>
@stop

@section("scripts")
        <!-- DATA TABES SCRIPT -->
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
        <!-- ckeditor -->
        <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
        <!-- BOOTSTRAP DATE PICKER -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
function go(obj){
  window.location = "video/"+obj.id;
}
function activar(i,a){
  $.post('activarcancion', {id:i,activo:a}, function(data, textStatus, xhr) {
  });

}
  $(function() {
    $("#fecha").datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        })
    CKEDITOR.replace('descripcion');
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
     
    $(".fileinput").fileinput({
        allowedFileTypes: ["audio"],
        browseClass: "btn btn-primary",
        showCaption: true,
        showRemove: true,
        showUpload: false,
        browseClass: "btn btn-success",
        browseLabel: "",
        browseIcon: '<i class="fa fa-music"></i>',
        removeClass: "btn btn-danger",
        removeLabel: "Descartar",
        msgInvalidFileType: "El formato del archivo no es el mp3",

        });

    // function getCurrentTime(){
    //     setTimeout(function(){
    //         var currentdate = new Date(); 
    //         var datetime = "Last Sync: " + currentdate.getDate() + "/"
    //         + (currentdate.getMonth()+1) + "/" 
    //         + currentdate.getFullYear() + " @ " 
    //         + currentdate.getHours() + ":" 
    //         + currentdate.getMinutes() + ":" 
    //         + currentdate.getSeconds();
    //         console.log(datetime);
    //         // document.getElementById("fecha").value = datetime; 
    //         $("#tiempo").val(datetime);
    //         getCurrentTime();
    // }
    // ,1000);
    // }

    // getCurrentTime();
    // 
    });
</script>
@stop
