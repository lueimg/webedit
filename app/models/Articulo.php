<?php

class Articulo extends \Eloquent {

		protected $table = 'articulo';
		protected $primaryKey = 'codArticulo';
		
		public function imagen()
		{
			return $this->belongsToMany('Imagen');
		}
		public function tipoarticulo()
		{
			return $this->belongsTo('Tipoarticulo');
		}
	
		public static function Guid()
		{
			return substr(md5(microtime()),rand(0,26),9);
		}

}