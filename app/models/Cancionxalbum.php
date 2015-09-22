<?php

class Cancionxalbum extends \Eloquent {
	protected $table = 'cancionxalbum';
	protected $primaryKey = 'id';
	public $timestamps = false;
		public function album()
		{
			return $this->belongsTo('Album');
		}
		public function cancion()
		{
			return $this->belongsTo('Cancion');
		}
}