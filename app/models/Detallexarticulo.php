<?php

class Detallexarticulo extends \Eloquent {
	protected $table = 'detallexarticulo';
	protected $primaryKey = 'articulo_id';
	
	public function articulo()
	{
		return $this->belongsTo('Articulo');
	}
}