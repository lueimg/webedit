<?php

class Galeria extends \Eloquent {

	protected $table = 'galeria';
	protected $primaryKey = 'codGaleria';
	public function imagen()
	{
		return $this->belongsToMany('Imagen');
	}
	public static function Guid()
	{
		return substr(md5(microtime()),rand(0,26),9);
	}
}