<?php

class Album extends \Eloquent {

		protected $table = 'album';
		protected $primaryKey = 'codAlbum';

		public function cancionxalbum()
		{
			return $this->hasMany('Cancionxalbum');
		}
		public static function Guid()
		{
			return substr(md5(microtime()),rand(0,26),9);
		}

}