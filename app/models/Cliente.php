<?php

class Cliente extends \Eloquent {

		protected $table = 'cliente';
		protected $primaryKey = 'codCliente';
		public $timestamps = false;

		public function contrato()
		{
			return $this->hasMany('Contrato');
		}
		public static function Guid()
		{
			return substr(md5(microtime()),rand(0,26),9);
		}

}