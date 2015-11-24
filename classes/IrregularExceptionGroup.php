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

	public static $enir = array('tenir');
	public static $fuir = array('fuir');
	public static $bouillir = array('bouillir');
	public static $saillir = array('saillir');
	public static $valoir = array('valoir');
	public static $voir = array('voir','prévoir','pourvoir');
	
	public static $devoir = array('devoir','redevoir');
	public static $mouvoir = array('autopromouvoir','mouvoir');
	public static $pouvoir = array('pouvoir');
	public static $savoir = array('resavoir','savoir');

	public static $rir = array('couvrir');
	public static $courir = array('courir');
	public static $mourir = array('remourir','mourir');
	public static $querir = array('acquérir');
	
	public static $dormir = array('dormir');
	public static $tir = array('assentir');
	public static $servir = array('servir');
	public static $cueillir = array('cueillir');
	
	public static $vetir = array('vêtir');
	
	public static $ohne_iss;
  static function init()
  {
    self::$ohne_iss = array_merge(
    		self::$enir,
    		self::$fuir,
    		self::$bouillir,
    		self::$saillir,
    		self::$valoir,
    		self::$voir,
    		self::$dormir,
    		self::$tir,
    		self::$servir,
    		self::$cueillir,
    		self::$rir,
    		self::$servir,
    		self::$courir,
    		self::$mourir,
    		self::$querir,
    		self::$vetir,
    		self::$devoir,
    		self::$mouvoir,
    		self::$pouvoir,
    		self::$savoir,
    		self::$vetir);
  }
}
IrregularExceptionGroup::init();
?> 