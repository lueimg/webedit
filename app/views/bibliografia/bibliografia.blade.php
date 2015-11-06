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
                  <div class="titulo">Bibliografia
                    <small><a href="">Regresar</a></small>
                  </div>
                  <br>

                 
                    <div class="video-wrapper">
                      Ingresando la historia del cantante
                    </div>
                  
              </div>
            </div>
          </div><!-- ./Articulos -->
          
      </div>
 
@stop
