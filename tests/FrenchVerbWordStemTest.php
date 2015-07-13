<?php
require_once '../conjugate.php';
class FrenchVerbWordStemTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider regularWordStemProvider
	 */
	public function testWordStem($expectedResult, $verb) {
		$this->assertEquals ( $expectedResult, word_stem ( $verb ) );
	}
	public function regularWordStemProvider() {
		return array (
				array (
						'aim',
						'aimer'
				)
		);
	}
}