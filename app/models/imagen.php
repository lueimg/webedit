<?php 
	class Imagen extends Eloquent {
		protected $table = 'imagen';
		protected $primaryKey = 'codImagen';
		public function noticia()
		{
			return $this->belongsToMany('Noticia');
		}
		public function articulo()
		{
			return $this->belongsToMany('Articulo');
		}
		public function galeria()
		{
			return $this->belongsToMany('Galeria');
		}
		public function usuario()
		{
			return $this->belongsToMany('user');
		}
		public function user()
		{
			return $this->hasOne('User');
		}
		public static function Guid()
		{
			return substr(md5(microtime()),rand(0,26),12);
		}
	}
?>
