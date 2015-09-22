<?php 
	class Evento extends Eloquent {
		protected $table = 'evento';
		protected $primaryKey = 'codEvento';
		public $timestamps = false;

		public function contrato()
		{
			return $this->hasOne('Contrato');
		}
		public function tipoevento()
		{
			return $this->belongsTo('TipoEvento');
		}
		public function establecimiento()
		{
			return $this->belongsTo('Establecimiento');
		}
		public static function Guid()
		{
			return substr(md5(microtime()),rand(0,26),9);
		}
	}
?>
