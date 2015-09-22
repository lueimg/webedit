<?php 
	class Noticia extends Eloquent {
		protected $table = 'noticia';
		protected $primaryKey = 'codNoticia';
		
		public function imagen()
		{
			return $this->belongsToMany('Imagen');
		}
		public static function Guid()
		{
			return substr(md5(microtime()),rand(0,26),9);
		}
	}
?>
