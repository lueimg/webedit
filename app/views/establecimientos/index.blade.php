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
    } #map-boton{
        padding: 10px 15px;
        margin: 0px 3px 3px 3px;
        height: 43px;
    }
      .controls {
        margin-top: 16px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        padding: 0 11px 0 13px;
        width: 400px;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        text-overflow: ellipsis;
      }

      #pac-input:focus {
        border-color: #4d90fe;
        margin-left: -1px;
        padding-left: 14px;  /* Regular padding-left + 1. */
        width: 401px;
      }

      .pac-container {
        font-family: Roboto;
      }
    #map-canvas{
        width: 100%;
        height: 250px;
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
                    <h3 class="box-title">Lista de Establecimientos</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Dirección</td>
                                <td>Capacidad</td>
                                <td>Descripción</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(isset($establecimientos))

							@foreach ($establecimientos as $establecimiento)
								<tr id="{{$establecimiento->codEstablecimiento}}" onclick="go(this)">
                                    <td>{{$establecimiento->nombEstablecimiento}}</td>
                                    <td>{{$establecimiento->direccion}}</td>
                                    <td>{{$establecimiento->capacidadAsistencia}}</td>
                                    <td>{{$establecimiento->descripcion}}</td>

									<td style="text-align:center"><a href="establecimiento/{{$establecimiento->codEstablecimiento}}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></a></td>

                                    <td style="text-align:center">
                                    	{{ Form::open(array('url' => 'establecimiento/' . $establecimiento->codEstablecimiento)) }}
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
            		Agregar Nuevo Establecimiento
            		</h3>
            	</div>
            	<div class="box-body">
            	{{ Form::open(array('url'=>'establecimiento', 'method' => 'POST','id'=>'crear')) }}
                                    
                {{ Form::text('nombEstablecimiento', Input::old('nombEstablecimiento'), array('placeholder'=>'Nombre Establecimiento','class' => 'form-control','id'=>'nombEstablecimiento','required')) }}<br>

				<select name="codDistrito" id="codDistrito" class="form-control">
                    <option value="">----------Distrito----------</option>
					@foreach ($distritos as $distrito)
						<option value="{{$distrito->codDistrito}}">{{$distrito->nombDistrito}}</option>
					@endforeach
				</select>
                <br>
                <br>
                {{ Form::text('direccion', Input::old('direccion'), array('placeholder'=>'Dirección','class' => 'form-control','id'=>'direccion','required')) }}<br>
                <label for="">Ingresa la ciudad</label>
                <input id="pac-input" class="controls" type="text" placeholder="Ubicación exacta">
                <div id="map-canvas"></div>
                <br>

                {{ Form::textarea('descripcion', Input::old('descripcion'), array('placeholder'=>'Descripción','class' => 'form-control','id'=>'descripcion','required','maxlength'=>150,'rows'=>3)) }}<br>

                {{ Form::text('capacidadAsistencia', Input::old('capacidadAsistencia'), array('placeholder'=>'Capacidad de Asistencia','class' => 'form-control','id'=>'capacidadAsistencia','required','maxlength'=>7)) }}<br>

                {{ Form::submit('Agregar', array('class'=>'btn btn-success')) }}

                <input type="text" name="latitud" style="visibility:hidden;position:absolute;" id="lat">
                <input type="text" name="longitud" style="visibility:hidden;position:absolute;" id="lon">
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
            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script>

var lati="",longi="";
function initialize() {
  var mapOptions = {
    center: new google.maps.LatLng(-33.8688, 151.2195),
    zoom: 15
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);

  var input = (
      document.getElementById('pac-input'));

  var types = document.getElementById('type-selector');
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
 
  });
    var markers = [];
    
    google.maps.event.addListener(map, 'click', function (event) {
            deleteMarkers();
            addMarker(event.latLng);
        });
    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        lati = location.lat();
        longi = location.lng();
        document.getElementById('lat').value=lati;
        document.getElementById('lon').value=longi;
        markers.push(marker);
    }
     function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

    function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }
    function clearMarkers() {
        setAllMap(null);
    }
 
}

google.maps.event.addDomListener(window, 'load', initialize);

function go(obj){
    window.location = "http://localhost:8080/TAP/tap/public/establecimiento/"+obj.id;
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
        $('#crear').on('submit', function(){
            if(document.getElementById('lat').value == ""){
                alert("Debes escoger una ubicación en el mapa primero")
                $('#pac-input').focus();
                return false;
            }
                return confirm('¿Está seguro de esta acción?');
        });
    });
</script>
@stop