<?php

class Establecimiento extends \Eloquent {

	protected $table = 'establecimiento';
	protected $primaryKey = 'codEstablecimiento';

	public function evento()
	{
		return $this->hasMany('Evento');
	}

	public static function Guid()
	{
		return substr(md5(microtime()),rand(0,26),9);
	}

}