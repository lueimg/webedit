<?php 

	class Cancion extends Eloquent {

		protected $table = 'cancion';
		protected $primaryKey = 'codCancion';
		
		public function cancionxalbum()
		{
			return $this->hasMany('Cancionxalbum');
		}
		public static function Guid()
		{
			return substr(md5(microtime()),rand(0,26),9);
		}
	}
?>
