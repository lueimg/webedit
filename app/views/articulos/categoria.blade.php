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


</style>      
@show

@section('content')
      <!-- Example row of columns -->
      <div class="row">
        <!-- Tipo articulos -->
          <div class="col-sm-3 pad-fix">
            <div class="dark-container">
               <header class="titulo"><a href="tienda" class="white">Tienda</a></header>
              <div class="wrapper">
                @foreach($tipoarticulos as $tarticulo)
                  <div class="well">
                    <a href="{{$tarticulo->codTipoArticulo}}">
                      {{$tarticulo->descripcion}} ({{count($tarticulo->Articulo)}})
                    </a>
                  </div>
                @endforeach
              </div>
            </div>
          </div><!-- ./Tipo articulos  -->
          
          <!-- Articulos -->
          <div class="col-sm-9 pad-fix">
            <div class="dark-container">
              <!-- <header class="titulo">$noticia->titulo <small>$noticia->fecha</small></header>  -->
              <div class="wrapper">
                  <div class="titulo">{{$categoria->descripcion}}
                    <small><a href="tienda">Regresar a Tienda</a></small>
                  </div>
                  <br>

                  @foreach($productos as $producto)
                    <a href="tienda/{{$producto->codArticulo}}" class="articulo">
                      <div class="articuloImg">
                        <img src="uploads/{{$producto->Imagen[0]->imagen_archivo}}" alt="">
                      </div>
                      <h4>{{$producto->nombArticulo}}</h4>
                      <h4><strong>${{$producto->precio}}</strong></h4>
                    </a>  
                  @endforeach
              </div>
            </div>
          </div><!-- ./Articulos -->
          
      </div>
 
@stop
