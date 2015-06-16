<?php
require 'conjugate.php';
class ConjugateFrenchVerbTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @dataProvider regularVerbProvider
	 */
	public function testRegularVerb($expectedResult, $verb, $tense, $person, $mood) {
		$this->assertEquals ( $expectedResult, conjugate ( $verb, $tense, $person, $mood ) );
	}
	public function testWordStem($expectedResult, $verb) {
		$this->assertEquals ( "aim", word_stem ( "aimer") );
	}	
	public function regularVerbProvider() {
		return array (
				array (
						"aime",
						"aimer",
						Tense::Present,
						Person::FirstPersonSingular,
						Mood::Indicative 
				),
				array (
						"aimes",
						"aimer",
						Tense::Present,
						Person::SecondPersonSingular,
						Mood::Indicative 
				),
				array (
						"aime",
						"aimer",
						Tense::Present,
						Person::ThirdPersonSingular,
						Mood::Indicative 
				), 
				array (
						"aimons",
						"aimer",
						Tense::Present,
						Person::FirstPersonPlural,
						Mood::Indicative 
				),
				array (
						"aimez",
						"aimer",
						Tense::Present,
						Person::SecondPersonPlural,
						Mood::Indicative 
				),
				array (
						"aiment",
						"aimer",
						Tense::Present,
						Person::ThirdPersonPlural,
						Mood::Indicative 
				) 				
		);
	}
}
?>