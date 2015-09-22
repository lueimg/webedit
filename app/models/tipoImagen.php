<?php 
	class TipoImagen extends Eloquent {
		protected $table = 'tipoimagen';
		public $timestamps = false;

		public function imagen()
		{
			return $this->hasMany('Imagen');
		}
		
		public static function Guid()
		{
			return substr(md5(microtime()),rand(0,26),12);
		}
	}
?>
