<?php

class Tipoarticulo extends \Eloquent {
	protected $table = 'tipo_articulo';
	protected $primaryKey = 'codTipoArticulo';
	public $timestamps = false;

	
	public function articulo(){
		return $this->hasMany('Articulo');
	}
}