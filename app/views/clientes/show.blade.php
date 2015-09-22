@extends('layouts.adminLayout')

@section('styles')
<!-- DATA TABLES -->
@stop

@section('content')

<div class="row">
    <div class="col-xs-6">
    	<div class="box">
			<div class="box-header">
				<h3 class="box-title">Detalle Cliente</h3>
			</div>
			<div class="box-body">
				<dl class="dl-horizontal">
					<dt>Razón Social</dt>
					<dd>{{$cliente->razonSocial}}</dd>
					<dt>Nombre del Representante: </dt>
					<dd>{{$cliente->representante}}</dd>
					<dt>DNI</dt>
					<dd>{{$cliente->dniRepresentante}}</dd>
					<dt>Dirección</dt>
					<dd>{{$cliente->direccion}}</dd>
					<dt>RUC</dt>
					<dd>{{$cliente->ruc}}</dd>
					<dt>Teléfono</dt>
					<dd>{{$cliente->telefono}}</dd>
				</dl>
				<a href="{{ URL::previous() }}" class="btn btn-default btn-sm">< Regresar</a>
			</div>
    	</div>
    </div>
</div>
@stop