@extends('layouts.adminLayout')

@section('styles')
<link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet"/>
   <!-- Bootstrap time Picker -->
    <link href="{{ asset('css/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"/>
    <!-- Bootstrap date Picker -->
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet"/>
<style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
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
                    <h3 class="box-title">Agenda</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
   <!-- Modal -->
<div id="modal" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
            Registrar Nuevo Evento
        </h4>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                {{ Form::submit('Agregar', array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
<div id="modal2" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
            Detalle del Evento
        </h4>
      </div>
      <div class="modal-body">
        <dl class="dl-horizontal">
            <dt>Evento:</dt>
            <dd id="nE"></dd>
            <dt>Fecha:</dt>
            <dd id="fE"></dd>
            <dt>Hore:</dt>
            <dd id="hE"></dd>
            <dt>Establecimiento:</dt>
            <dd id="cE"></dd>
            <dt>Tipo de Evento:</dt>
            <dd id="tE"></dd>
            <dt>Estado:</dt>
            <dd id="aC"></dd>
            <dt>Descripción:</dt>
            <dd id="descr"></dd>
        </dl>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    </div>
@stop

@section("scripts")
<script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/lang/es.js') }}" type="text/javascript"></script>
<script>
    var e = [ 
        @foreach($eventos as $evento)
            {
                id: '{{$evento->codEvento}}',
                title: '{{$evento->nombEvento}}',
                start: '{{$evento->fechaEvento}}'
                //if($evento->horaEvento)
                // start: '{$evento->fechaEvento}}T{$evento->horaEvento}}:00'
                // else 
                // endif
            },
        @endforeach
        ];
    var today = new Date(),
    dd = today.getDate(),
    mm = today.getMonth()+1,
    yyyy = today.getFullYear();
    if(dd<10) { dd='0'+dd} 
    if(mm<10) { mm='0'+mm} 
    today = yyyy+'-'+mm+'-'+dd;

    $("#fechaEvento").datepicker({
        format: 'dd/mm/yyyy',
        starDate: '-3d'
    });
        $("#horaEvento").timepicker({
            showInputs: false,      
            disableFocus: true,
            showMeridian: false,
        });


    $(document).ready(function() {
    
        function a(id){
             $.ajax({
                        url: 'getEvento',
                        type: 'get',
                        data: {id:id}
                    })
                    .done(function(data) {
                        $('#nE').html(data.nombEvento);
                        $('#fE').html(data.fechaEvento);
                        $('#hE').html(data.horaEvento);
                        $('#cE').html(data.establecimiento_id);
                        $('#tE').html(data.tipoevento_id);
                        $('#aC').html(data.activo);
                        $('#descr').html(data.descripcion);
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
        }

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            // select: function(start, end) {
            //     // var title = prompt('Titulo de Evento:');
            //     // var eventData;
            //     // if (title) {
            //     //     eventData = {
            //     //         title: title,
            //     //         start: start,
            //     //         end: end
            //     //     };
            //     //     $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
            //     // }
            //     // $('#calendar').fullCalendar('unselect');
            //     // a(title,start._i);
            // },
            dayClick: function(date){
                var year = date.format().substr(0,4),
                month = date.format().substr(5,2),
                day = date.format().substr(8,2);
                $("#fechaEvento").val(day+"/"+ month +"/"+year);
                $('#modal').modal('toggle');
            },
            defaultDate: today,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: e,
            eventClick: function(event){
                a(event.id);
             
                
                $('#modal2').modal('toggle');
            }
        });
        
    });

</script>
@stop
