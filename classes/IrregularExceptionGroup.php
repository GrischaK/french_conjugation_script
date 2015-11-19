<?php
class IrregularExceptionGroup {
	public static $vetir = array('dévêtir','redévêtir','revêtir','se dévêtir','se redévêtir','se sous-vêtir','se vêtir','sous-vêtir','survêtir','vêtir');
	public static $mouvoir = array('autopromouvoir','auto-promouvoir','émouvoir','mouvoir','promouvoir','réémouvoir','remouvoir','repromouvoir','se mouvoir'); // 9 Verben

	public static $ohne_iss;
  static function init()
  {
    self::$ohne_iss = array_merge(self::$mouvoir);
  }
}
IrregularExceptionGroup::init();
?> 