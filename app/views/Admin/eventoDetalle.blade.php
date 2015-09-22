@extends('layouts.adminLayout')

@section('styles')
<!-- DATA TABLES -->
@stop

@section('content')

<div class="row">
    <div class="col-xs-6">
    	<div class="box">
			<div class="box-header">
				<h3 class="box-title">Detalle Evento</h3>
			</div>
			<div class="box-body">
				<dl class="dl-horizontal">
					<dt>Codigo de Evento</dt>
					<dd>{{$eventos->codEvento}}</dd>
					<dt>Fecha </dt>
					<dd>{{$eventos->fechaEvento}}</dd>
					<dt>Hora</dt>
					<dd>{{$eventos->horaEvento}}</dd>
					<dt>Codigo de Establecimiento</dt>
					<dd>{{$eventos->codEstablecimiento}}</dd>
					<dt>Descripcion</dt>
					<dd>{{$eventos->descripcion}}</dd>
					<dt>Tipo Evento</dt>
					<dd>{{$eventos->idTipoEvento}}</dd>
				</dl>
			</div>
    	</div>
    </div>
</div>
@stop