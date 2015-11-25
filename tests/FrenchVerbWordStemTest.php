<?php
require_once '../conjugate.php';
class FrenchVerbWordStemTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider regularWordStemProvider
	 */
	public function testWordStem($expectedResult, $infinitiveVerb, $person, $tense, $mood) {
		$this->assertEquals ( $expectedResult, word_stem ( new InfinitiveVerb( $infinitiveVerb), new Person($person), new Tense($tense), new Mood($mood) ) );
	}
	public function regularWordStemProvider() {
		return [
				[
						'aim',
						'aimer',
						'FirstPersonSingular',
						'Present',
						'Indicatif'
				]
		];
	}
}