<?php
require 'conjugate.php';
class ConjugateFrenchVerbTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider regularVerbProvider
	 */
	public function testRegularVerb($expectedResult, $verb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugation_phrase ( $verb, $tense, $person, $mood ) );
	}
	public function regularVerbProvider() {
		return array (
				array (
						"J'aime",
						"aimer",
						Tense::Present,
						Person::FirstPersonSingular,
						Mood::Indicative 
				),
				array (
						"Tu aimes",
						"aimer",
						Tense::Present,
						Person::SecondPersonSingular,
						Mood::Indicative 
				),
				array (
						"Il aime",
						"aimer",
						Tense::Present,
						Person::ThirdPersonSingular,
						Mood::Indicative 
				) 
		);
	}
}

?>