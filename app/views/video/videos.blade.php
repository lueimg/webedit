@extends('layouts.webLayout')
@section('styles')
<style>
.well{
  padding: 10;
  border: none;
  border-radius: 0;
  background: rgba(80,80,80,0.4);
   margin-bottom: 0px; 
}      
.well p{
  font-size: 14px;
}
.well a{
  /*text-decoration: none;*/
  /*color: #fff;*/
}
.well a:hover{
  /*background: rgba(0,0,0,.5);*/
  /*color:red;*/
}
.titulo small{
  font-size: 16px;
  color: #929685;
  float: right;
  margin-top: 15px;
}
.video-wrapper{
  width: 310px;
  height: 310px;
  display: inline-block;
  margin-right: 40px;
}


</style>      
@show

@section('content')
      <!-- Example row of columns -->
      <div class="row">
          <!-- Articulos -->
          <div class="col-sm-12 pad-fix">
            <div class="dark-container">
              <!-- <header class="titulo">$noticia->titulo <small>$noticia->fecha</small></header>  -->
              <div class="wrapper">
                  <div class="titulo">Videos
                    <small><a href="http://localhost:8080/TAP/tap/public/">Regresar</a></small>
                  </div>
                  <br>

                  @foreach($videos as $video)
                    <div class="video-wrapper">
                      <div class="articuloImg" style="width:320px;">
                         <iframe id="ytplayer" type="text/html" style="width:100%;height: 210px"src="https://www.youtube.com/embed/{{$video->link}}?version=3&autoplay=0&autohide=1&color=white&modestbranding=1" frameborder="0" allowfullscreen></iframe>
                      </div>
                      <h4><strong>{{$video->nombVideo}}</strong></h4>
                    </div>
                    <div class="video-wrapper">
                       <div class="articuloImg" style="width:320px;">
                         <iframe id="ytplayer" type="text/html" style="width:100%;height: 210px"src="https://www.youtube.com/embed/{{$video->link}}?version=3&autoplay=0&autohide=1&color=white&modestbranding=1" frameborder="0" allowfullscreen></iframe>
                      </div>
                      <h4><strong>{{$video->nombVideo}}</strong></h4>
                    </div>
                      <div class="video-wrapper">
                       <div class="articuloImg" style="width:320px;">
                         <iframe id="ytplayer" type="text/html" style="width:100%;height: 210px"src="https://www.youtube.com/embed/{{$video->link}}?version=3&autoplay=0&autohide=1&color=white&modestbranding=1" frameborder="0" allowfullscreen></iframe>
                      </div>
                      <h4><strong>{{$video->nombVideo}}</strong></h4>
                    </div>
                  @endforeach
              </div>
            </div>
          </div><!-- ./Articulos -->
          
      </div>
 
@stop
