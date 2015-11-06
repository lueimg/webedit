<script type="text/javascript">
var latitudG;
var longitudG;
$(document).ready(function() {
alert("Hola mundo");
    //$("#bandejaModal").attr("onkeyup","return enterGlobal(event,'btn_gestion_modal')");

    $('#eventoModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // captura al boton
        var modal = $(this); //captura el modal
        variables={evento:button.data('id')}
alert("Ingresnado yo ando");
        CargarEvento(variables);
    });

    $('#eventoModal').on('hide.bs.modal', function (event) {
        var modal = $(this); //captura el modal
    });


});

CargarEvento:function(datos){
        $.ajax({
            url         : 'evento/eventodetalle',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
            },
            success : function(obj) {
                if(obj.rst==1){
                    mostrarDetalle(obj.datos);
                }
            },
            error: function(){
                alert('Ocurrio un problema al momento de extraer información favor de intentar nuevamente; Si el problema persiste favor de comunicar a su supervisor');
            }
        });
    }
}

mostrarDetalle=function(objdatos){
    $("#txt_evento").val(objdatos.nombEvento);
    $("#txt_descripcion").val(objdatos.descripcion);
    $("#txt_fecha").val(objdatos.fechaEvento+" "+objdatos.horaEvento);
    $("#txt_est").val(objdatos.est);
    latitudG=objdatos.latitud;
    longitudG=objdatos.longitud;
    google.maps.event.addDomListener(window, 'load', initialize);
}


function initialize() {
  var mapOptions = {
    center: new google.maps.LatLng( latitudG, longitudG),
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
    addMarker(new google.maps.LatLng( latitudG, longitudG));
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




</script>
