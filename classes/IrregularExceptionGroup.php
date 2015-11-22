<?php
class IrregularExceptionGroup {
	public static $eler_ele = array('peler');
	public static $eter_ete = array('acheter');	

	public static $eler_elle = array('appeler');
	public static $eter_ette = array('jeter');

	public static $envoyer = array('envoyer');

	public static $cer = array('agacer');
	public static $ger = array('manger');

	public static $e_akut_er = array('accélérer','espérer','sécher','redégénérer');
	public static $e_er = array('peser');
	

	public static $devoir = array('devoir');
	public static $mouvoir = array('mouvoir');
	public static $pouvoir = array('pouvoir');
	public static $savoir = array('savoir');

	public static $courir = array('courir');
	public static $mourir = array('mourir');
	public static $querir = array('acquérir');
	
	public static $vetir = array('vêtir');
	
	public static $ohne_iss;
  static function init()
  {
    self::$ohne_iss = array_merge(self::$devoir,self::$mouvoir,self::$pouvoir,self::$savoir,self::$vetir);
  }
}
IrregularExceptionGroup::init();
?> 