<?php

class Tema extends \Eloquent {

	protected $table = 'tema';
	protected $primaryKey = 'codTema';
	
	public function replies()
	{
		return $this->hasMany('Tema','tema_id');
	}
	
	public function user()
	{
		return $this->belongsTo('User');
	}
	public static function Guid()
	{
		return substr(md5(microtime()),rand(0,26),9);
	}

}