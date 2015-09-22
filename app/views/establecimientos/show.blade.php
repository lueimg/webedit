@extends('layouts.adminLayout')

@section('styles')
<!-- DATA TABLES -->
@stop

@section('content')

<div class="row">
    <div class="col-xs-6">
    	<div class="box">
			<div class="box-header">
				<h3 class="box-title">Detalle Establecimiento</h3>
			</div>
			<div class="box-body">
				<dl class="dl-horizontal">
					<dt>Nombre del Establecimiento</dt>
					<dd>{{$establecimiento->nombEstablecimiento}}</dd>
					<dt>Dirección: </dt>
					<dd>{{$establecimiento->direccion}}</dd>
					<dt>Capacidad de asistencia</dt>
					<dd>{{$establecimiento->capacidadAsistencia}}</dd>
					<dt>Distrito</dt>
					<dd>{{$establecimiento->codDistrito}}</dd>
					<dt>Descripción</dt>
					<dd>{{$establecimiento->descripcion}}</dd>
				</dl>
				<a href="{{ URL::previous() }}" class="btn btn-default btn-sm">< Regresar</a>
			</div>
    	</div>
    </div>
</div>
@stop