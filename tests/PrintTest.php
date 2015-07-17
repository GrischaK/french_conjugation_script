<?php
require_once 'conjugate.php';
require_once 'print.php';
class PrintTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider PrintProvider
	 */
	public function testPrint($expectedResult, $verb) {
		$this->expectOutputString ( $expectedResult );
		print_conjugations_of_verb ( $verb );
	}
	public function PrintProvider() {
		return array (
				array (
						'',
						'aimer' 
				) 
		);
	}
}
?>
