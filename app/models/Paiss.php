<?php

class Paiss extends \Eloquent {

	protected $table = 'pais';
	protected $primaryKey = 'codPais';
	public $timestamps = false;
	public function contrato()
		{
			return $this->hasMany('departamentos');
		}
	public static function Guid()
	{
		return substr(md5(microtime()),rand(0,26),9);
	}
}