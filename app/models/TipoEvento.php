<?php

class TipoEvento extends \Eloquent {

	protected $table = 'tipo_evento';
	protected $primaryKey = 'idTipoEvento';
	public $timestamps = false;
	public function evento()
	{
		return $this->hasMany('Evento');
	}

	public static function Guid()
	{
		return substr(md5(microtime()),rand(0,26),9);
	}

}