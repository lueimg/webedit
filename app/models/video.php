<?php 
	class Video extends Eloquent {
		protected $table = 'video';
		protected $primaryKey = 'codVideo';
		public $timestamps = false;
		public static function Guid()
		{
			return substr(md5(microtime()),rand(0,26),12);
		}
	}
?>
