<?php 
	class Contrato extends Eloquent {
		protected $table = 'contrato';
		protected $primaryKey = 'codContrato';
		public $timestamps = false;

		public function evento()
		{
			return $this->belongsTo('Evento');
		}
		public function cliente()
		{
			return $this->belongsTo('Cliente');
		}
		public static function Guid()
		{
			return substr(md5(microtime()),rand(0,26),9);
		}
	}
?>
