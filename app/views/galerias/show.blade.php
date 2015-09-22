@extends('layouts.webLayout')
@section('styles')
<!-- Image Uploader -->
        <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/basic.css') }}" rel="stylesheet" type="text/css" />
	<style>
		.mg{
			width: 142px;
			max-height: 142px;

		}
	</style>
@stop
@section('content')
	  <div class="row"> 
        <div class="col-sm-3 pad-fix">
          <ul class="dark-container year-list ">
            <header class="titulo">Galerías</header>
            <!-- EN CADA UNO VAN LOS AÑOS -->
            <?php $c=[]; ?>
            @foreach ($galerias as $gal)
				@if (!in_array(substr($gal->fecha, 0, 4), $c))
	            <?php $c[] = substr($gal->fecha, 0, 4); ?>
	            <li><a href="http://localhost:8080/TAP/tap/public/galerias/fecha/{{substr($gal->fecha, 0, 4)}}">{{substr($gal->fecha, 0, 4)}}</a></li>
	            @else
					
				@endif

            @endforeach
          </ul>
            
        </div>
        <div class="col-sm-9 pad-fix">
          <ul class="dark-container albumes">
           <header class="titulo">{{$galeria->nombGaleria}} 
            @if (Session::has('usuario'))
              <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#addModal" data-dismiss="modal" aria-hidden="true"><i class="fa fa-plus"></i> Agregar</a>
            @endif
           </header>
           <br>
	               	@foreach ($galeria->Imagen as $img)
           <li>
             <div class="thumb">
               <a href="http://localhost:8080/TAP/tap/public/galerias/{{$galeria->codGaleria}}">
		           <img src="http://localhost:8080/TAP/tap/public/uploads/{{$img->imagen_archivo}}" class='img-responsive mg' alt="">
               </a>
             </div>
             <h4 style="text-align: center">
               <a href="#">
                 {{$img->descripcion}}
               </a>
             </h4>
           </li>
	               	@endforeach
          </ul>
			
        </div>
        
        

      </div>

      <div id="addModal" class="modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 0;">
            <div class="modal-header" style="border:none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"  onclick="cerrarLogin()">×</button>
                <h1 class="text-center" style="font-family: Bebas;">AGREGA IMAGENES A ESTA GALERÍA</h1>
            </div>

            <div class="modal-body" style="height: 210px;">
                <div class="form col-md-12 center-block">
                  <form action="{{ url('imagen/subirfan')}}" class="dropzone" id="my-awesome-dropzone">
                    <input name="codGaleria" type="hidden" value="{{$galeria->codGaleria}}">
                  </form>
                  <br>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                  <button class="btn" style="font-family: Bebas;border-radius: 0;" data-dismiss="modal" aria-hidden="true" onclick="cerrarLogin()">Cancelar</button>
                </div>  
            </div>
        </div>
        </div>
      </div>
@stop
@section('scripts')
<!-- IMAGE UPLOADER -->
  <script src="{{ asset('js/dropzone.min.js') }}" type="text/javascript"></script>
  <script>
  $(document).ready(function() {
      Dropzone.options.myAwesomeDropzone = {
       headers: {'tipoimagen': tipo} // The name that will be used to transfer the file
      };
  });
  </script>
@stop