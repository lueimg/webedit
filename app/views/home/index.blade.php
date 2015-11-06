@extends('layouts.webLayout')
@section('styles')
       
<style>
 .sm2-bar-ui .sm2-main-controls,
.sm2-bar-ui .sm2-playlist-drawer {
 background-color: #161612;
}
.well{
  padding: 0;
  border: none;
  border-bottom: 1px solid;
  border-radius: 0;
  background: transparent;
}      
.well p{
  font-size: 14px;
}
.well a{
  text-decoration: none;
}
.well a:hover{
  background: rgba(0,0,0,.5);
  color:red;
}

#map-boton{
        padding: 10px 15px;
        margin: 0px 3px 3px 3px;
        height: 43px;
    }
 .map-canvas{
        width: 100%;
        height: 250px;
      }
</style>      
@show
@section('content')
      <!-- Example row of columns -->
      <div class="row"> 
          <div class="col-sm-8 pad-fix">
            <div class="dark-container">
              <div class="box_skitter box_skitter_large">
                <ul>
                    @foreach($imagenes as $imagen)
                      <li><a href="#block">
                      <img class="block" src="uploads/{{$imagen->imagen_archivo}}" alt="">
                      </a></li>
                    @endforeach
             <!--      <li><a href="#cube"><img src="assets/img/001.jpg" class="cube" /></a></li>
                  <li><a href="#cubeRandom"><img src="assets/img/002.jpg" class="cubeRandom" /></a></li>
                  <li><a href="#block"><img src="assets/img/003.jpg" class="block" /></a></li>
                  <li><a href="#cubeStop"><img src="assets/img/004.jpg" class="cubeStop" /></a></li>   -->
                </ul>
              </div>
            </div>
          </div>

          <!-- Videos -->  
          <div class="hidden-xs col-sm-4 pad-fix">
            <div class="dark-container">
              <header class="titulo">Video</header>
              @foreach ($video as $x)
              <div class="wrapper">
                <iframe id="ytplayer" type="text/html" style="width:100%;"src="https://www.youtube.com/embed/{{$x->link}}?version=3&autoplay=0&autohide=1&color=white&modestbranding=1" frameborder="0" allowfullscreen></iframe>
              </div>
              @endforeach
            </div>
          </div><!-- ./Videos -->
      </div>
      <div style="width:100%;height:10px;"></div>
      <div class="row">
        <!-- Eventos -->
          <div class="col-sm-3 pad-fix">
            <div class="dark-container">
              <header class="titulo">Eventos</header>
              @foreach ($eventos as $evento)
              <div class="wrapper">
                    @if ($evento->activo == 1)
                      <div class="well">
                        
                        <a  data-toggle="modal" data-target="#eventoModal" data-id="{{$evento->codEvento}}"> 
                            {{-- expr --}}
                        <strong>{{$evento->nombEvento}}</strong><br>
                        <p>
                        Lugar: <strong>{{$evento->Establecimiento->nombEstablecimiento}}</strong><br>
                        Fecha: <strong>{{$evento->fechaEvento}}</strong><br>
                        Hora: <strong>{{$evento->horaEvento}}</strong></p>
                        </a>
                      </div>
                    @endif
              </div>
              @endforeach
              @if(Session::has('usuario'))
              <br>
                  <script id="sid0020000077550760862">(function() {function async_load(){s.id="cid0020000077550760862";s.src=(window.location.href.indexOf('file:///') > -1 ? 'http:' : '') + '//st.chatango.com/js/gz/emb.js';s.style.cssText="width:250px;height:350px;";s.async=true;s.text='{"handle":"daniellazooficial","arch":"js","styles":{"a":"000000","b":100,"c":"FFFFFF","d":"FFFFFF","k":"000000","l":"000000","m":"000000","n":"FFFFFF","q":"000000","r":100}}';var ss = document.getElementsByTagName('script');for (var i=0, l=ss.length; i < l; i++){if (ss[i].id=='sid0020000077550760862'){ss[i].id +='_';ss[i].parentNode.insertBefore(s, ss[i]);break;}}}var s=document.createElement('script');if (s.async==undefined){if (window.addEventListener) {addEventListener('load',async_load,false);}else if (window.attachEvent) {attachEvent('onload',async_load);}}else {async_load();}})();</script>
                  @endif
            </div>
          </div><!-- ./Eventos  -->

          <!-- Noticias -->
          <div class="col-sm-5 pad-fix">
            <div class="dark-container">
              <header class="titulo">Noticias</header>
              <div class="wrapper">
                @foreach($noticias as $noticia)
                  
                <div class="well">
                  <a href="">
                    <?php 
                      $h = "";
                      foreach ($noticia->Imagen as $key) {
                        $h = $key->imagen_archivo;
                      }
                     ?>
                    <img class="img-responsive" src="/TAP/tap/public/uploads/{{$h}}" alt="">
                  </a>
                  <br>
                  <strong>{{$noticia->titulo}}</strong>
                  <p>
                    {{$noticia->breveDescripcion}}
                  <a href="noticias/{{$noticia->codNoticia}}">Leer más</a></p>
                </div>
                @endforeach

              </div>
            </div>
          </div><!-- ./Noticias -->
          <!-- Canciones -->
          <div class="col-sm-4 pad-fix">
            <div class="dark-container">
              <header class="titulo">Música</header>
                     <div class="sm2-bar-ui flat full-width">
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
                          @foreach ($canciones as $cancion)
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
                  <br>
                  <br>
        
              <br>
            <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fdaniellazooficial&amp;width&amp;height=290&amp;colorscheme=dark&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:290px;" allowTransparency="true"></iframe>
            <br><br>
            <a class="twitter-timeline" href="https://twitter.com/AndreaLuisaD" data-widget-id="535133580381663232">Tweets por el @AndreaLuisaD.</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            

            </div>
          </div><!-- ./Canciones -->
      </div>
 
@stop
@section("scripts")
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
 <script src="{{ asset('js/soundmanager2-nodebug-jsmin.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bar-ui.js') }}" type="text/javascript"></script>

<script type="text/javascript">
var latitudG='-12.140625972363933';
var longitudG='-76.9921875';
var contador=0;
$(document).ready(function() {
    //$("#bandejaModal").attr("onkeyup","return enterGlobal(event,'btn_gestion_modal')");

    $('#eventoModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // captura al boton
        var modal = $(this); //captura el modal
        variables={evento:button.data('id')}
        CargarEvento(variables);

    });

    $('#eventoModal').on('hide.bs.modal', function (event) {
        var modal = $(this); //captura el modal
    });
});


CargarEvento=function(datos){
        $.ajax({
            url         : 'eventoajax/eventodetalle',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
              contador++;
              $("#canvas").html("<div class='map-canvas' id='map-canvas-"+contador+"'></div>");
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

mostrarDetalle=function(objdatos){
    $("#txt_evento").val(objdatos.nombEvento);
    $("#txt_descripcion").val(objdatos.descripcion);
    $("#txt_fecha").val(objdatos.fechaEvento+" "+objdatos.horaEvento);
    $("#txt_est").val(objdatos.est);
    $("#txt_dis").val(objdatos.nombDistrito);
    $("#txt_dir").val(objdatos.direccion);
    latitudG=objdatos.latitud;
    longitudG=objdatos.longitud;
    initialize();
}


function initialize() {
latitudG='-12.140625972363933';
longitudG='-76.9921875';
  var mapOptions = {
    center: new google.maps.LatLng( latitudG, longitudG),
    zoom: 15
  };
  var map = new google.maps.Map(document.getElementById('map-canvas-'+contador),
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
        latitudG = location.lat();
        longitudG = location.lng();
        document.getElementById('lat').value=latitudG;
        document.getElementById('lon').value=longitudG;
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
        <link href="{{ asset('css/soundmanager/bar-ui.css') }}" rel="stylesheet" type="text/css" />
        @include( 'home.evento_modal' )
@stop
