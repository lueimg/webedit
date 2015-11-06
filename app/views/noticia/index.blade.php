@extends('layouts.webLayout')
@section('styles')
<style>
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
header small{
  font-size: 16px;
  color: #929685;
  float: right;
}
</style>      
@show

@section('content')
      <!-- Example row of columns -->
      <div class="row">
        <!-- Eventos -->
          <div class="col-sm-2 pad-fix">
            <div class="dark-container">
              <header class="titulo">Noticias</header>
              <div class="wrapper">
                @foreach($noticias as $noticia)
                  <div class="well">
                    <a href="{{$noticia->codNoticia}}"><strong>{{$noticia->titulo}}</strong></a><br><small style="font-size: 13px;color:#646464;"> {{$noticia->fecha}}</small>
                    <p style="max-height: 70px;overflow:hidden;">{{$noticia->breveDescripcion}}</p>
                  </div>
                @endforeach
              </div>
            </div>
          </div><!-- ./Eventos  -->
          
          <!-- Noticias -->
          <div class="col-sm-7 pad-fix">
            <div class="dark-container">
              <header class="titulo">{{$noticia->titulo}} <small>{{$noticia->fecha}}</small></header> 
              <div class="wrapper">
                {{$noticia->descripcion}}                              
              </div>
            </div>
          </div><!-- ./Noticias -->
          <div class="hidden-xs col-sm-3 pad-fix">
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
 
@stop
