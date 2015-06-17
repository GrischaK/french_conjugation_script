<?php
require 'conjugate.php';
class AuxiliaireTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider regularAuxiliaireProvider
	 */
	public function testAuxiliaire($expectedResult, $verb) {
		$this->assertEquals ( $expectedResult, $auxiliaire( $verb ) );
	}
	public function regularAuxiliaireProvider() {
		return array (
				array (
						"être",
						"accourir"
				)
		);
	}
}


