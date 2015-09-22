@extends('layouts.adminLayout')

@section('styles')
<!-- DATA TABLES -->
@stop

@section('content')

<div class="row">
    <div class="col-xs-6">
    	<div class="box">
			<div class="box-header">
				<h3 class="box-title">Detalle Noticia</h3>
			</div>
			<div class="box-body">
				<dl class="dl-horizontal">
					<dt>Codigo de Noticia</dt>
					<dd>{{$noticias->codNoticia}}</dd>
					<dt>Titulo </dt>
					<dd>{{$noticias->titulo}}</dd>
					<dt>Fecha</dt>
					<dd>{{$noticias->fecha}}</dd>
					<dt>Descripcion</dt>
					<dd>{{$noticias->descripcion}}</dd>
					<dt>Codigo de Evento</dt>
					<dd>{{$noticias->codImagen}}</dd>
				</dl>
			</div>
    	</div>
    </div>
</div>
@stop