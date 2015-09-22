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
.producto img{
  width: 100%
}


  
</style>      
@show

@section('content')
      <!-- Example row of columns -->
      <div class="row">
        <!-- Tipo articulos -->
          <div class="col-sm-3 pad-fix">
            <div class="dark-container">
              <header class="titulo"><a href="http://localhost:8080/TAP/tap/public/tienda" class="white">Tienda</a></header>
              <div class="wrapper">
                @foreach($tipoarticulos as $tarticulo)
                  <div class="well">
                    <a href="http://localhost:8080/TAP/tap/public/tienda/categoria/{{$tarticulo->codTipoArticulo}}">
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
              <header class="titulo">{{$producto->nombArticulo}} <small></small>
                  <small><a href="http://localhost:8080/TAP/tap/public/tienda">Regresar a Tienda</a></small>
              </header> 
              <div class="wrapper">
                <div class="producto row">
                  <div class="col-sm-5">
                    <img src="http://localhost:8080/TAP/tap/public/uploads/{{$producto->Imagen[0]->imagen_archivo}}" alt="">
                  </div>
                  <div class="col-sm-7">
                    <p>{{$producto->descripcion}}</p>
                    <br>
                    <h2 class="white">
                      ${{$producto->precio}}
                    </h2>
                    <br>
                    <div class="purchase">
                      <select name="cantidad" id="cantidad">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                      <button class="btn btn-danger"><i class="glyphicon glyphicon-shopping-cart"></i> AGREGAR AL CARRITO </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- ./Articulos -->
          
      </div>
 
@stop
