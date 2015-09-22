@extends('layouts.webLayout')
@section('content')
	  <div class="row"> 
        <div class="col-sm-3 pad-fix">
          <ul class="dark-container year-list ">
            <header class="titulo">Galerías</header>
            <!-- EN CADA UNO VAN LOS AÑOS -->
            <?php $c=[]; ?>
            @foreach ($galerias as $galeria)
				@if (!in_array(substr($galeria->fecha, 0, 4), $c))
	            <?php $c[] = substr($galeria->fecha, 0, 4); ?>
	            <li><a href="galerias/fecha/{{substr($galeria->fecha, 0, 4)}}">{{substr($galeria->fecha, 0, 4)}}</a></li>
	            @else
					
				@endif

            @endforeach
          </ul>
            
        </div>
        <div class="col-sm-9 pad-fix">
          <ul class="dark-container albumes">

 		   @if (!isset($gale))
           <header class="titulo">Todas las Galerías</header>
           <br>
           @foreach ($galerias as $galeria)
           <li>
             <div class="thumb">
               <a href="galerias/{{$galeria->codGaleria}}">
               	@if (count($galeria->Imagen)>3)
	               	<?php $i = 0; ?>
	               	@foreach ($galeria->Imagen as $img)
		                 <img src="uploads/{{$img->imagen_archivo}}" class='album-preview' alt="">
		                 <?php $i++; ?>
	               	@endforeach
               	@else
               		 <img src="uploads/{{$galeria->Imagen[0]->imagen_archivo}}" class='img-responsive' alt="">
               	@endif
               </a>
             </div>
             <h4 style="text-align: center">
               <a href="galerias/{{$galeria->codGaleria}}">
                 {{$galeria->nombGaleria}}
               </a>
             </h4>
           </li>
           <?php $i=0; ?>
           @endforeach
			@else
				   <header class="titulo">Galerías / {{substr($gale[0]->fecha, 0, 4)}}</header>
		           <br>
		           
		           @foreach ($gale as $galeria)
		           <li>
		             <div class="thumb">
		               <a href="galerias/{{$galeria->codGaleria}}">
		               	@if (count($galeria->Imagen)>3)
			               	<?php $i = 0; ?>
			               	@foreach ($galeria->Imagen as $img)
				                 <img src="uploads/{{$img->imagen_archivo}}" class='album-preview' alt="">
				                 <?php $i++; ?>
			               	@endforeach
		               	@else
		               		 <img src="uploads/{{$galeria->Imagen[0]->imagen_archivo}}" class='img-responsive' alt="">
		               	@endif
		               </a>
		             </div>
		             <h4 style="text-align: center">
		               <a href="galerias/{{$galeria->codGaleria}}">
		                 {{$galeria->nombGaleria}}
		               </a>
		             </h4>
		           </li>
		           <?php $i=0; ?>
		           @endforeach
		   @endif
          </ul>
        </div>
      </div>
@stop
