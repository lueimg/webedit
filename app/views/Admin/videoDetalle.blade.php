@extends('layouts.adminLayout')

@section('styles')
<!-- DATA TABLES -->
@stop

@section('content')

<div class="row">
    <div class="col-xs-6">
    	<div class="box">
			<div class="box-header">
				<h3 class="box-title">Detalle Video</h3>
			</div>
			<div class="box-body">
				<dl class="dl-horizontal">
					<dt>Codigo de Video</dt>
					<dd>{{$videos->codVideo}}</dd>
					<dt>Nombre del Video : </dt>
					<dd>{{$videos->nombVideo}}</dd>
					<dt>Link</dt>
					<dd>{{$videos->link}}</dd>
					<dt>Descripcion</dt>
					<dd>{{$videos->descripcion}}</dd>
				</dl>
			</div>
    	</div>
    </div>
</div>
@stop