<?php
require_once 'conjugate.php';
class FrenchVerbWordStemTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider regularWordStemProvider
	 */
	public function testWordStem($expectedResult, $infinitiveVerb) {
		$this->assertEquals ( $expectedResult, word_stem ( new InfinitiveVerb($infinitiveVerb) ) );
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